<?php

namespace App\Http\Controllers;

use App\Models\assignedCaptcha;
use App\Models\boughtPackage;
use App\Models\Captcha;
use App\Models\market;
use App\Models\myasset;
use App\Models\nft;
use App\Models\Package;
use App\Models\suggestion;
use App\Models\team;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $account_id = $user->account_id;
        } else $account_id = '';
        return view('user.index', compact('account_id'));

        return view('user.index');
    }
    public function home()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();

        return view('user.index', compact('account_id', 'user', 'wallet'));
    }
    public function captcha()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $captcha = Captcha::all();
        $boughtPackages = BoughtPackage::where('user_id', $user->id)->get();

        $assignedCaptchas = AssignedCaptcha::where('user_id', $user->id)->get();

        foreach ($assignedCaptchas as $acs) {
            // Check if the assigned captcha is older than 90 days
            if (Carbon::parse($acs->start_at)->addDays(90)->lt(now())) {

                $bps = BoughtPackage::find($acs->bought_package_id);
                if ($bps) {
                    $bps->delete();
                }

                // Delete the assigned captcha
                $acs->delete();
            }
        }

        foreach ($assignedCaptchas as $acs) {

            if (Carbon::parse($acs->expired_at)->lt(now())) {
                $acs->expired_at = Carbon::parse($acs->expired_at)->addHours(24);
                $acs->used = 0;
                $acs->save();
            }
        }

        $assignedCaptchas1 = AssignedCaptcha::where('user_id', $user->id)->get();

        $presentCaptchaVal = null;
        foreach ($assignedCaptchas1 as $acs) {
            if ($acs->used >= 10) {
                continue;
            }

            $presentCaptchaVal = $acs;
            //$acs->used = $acs->used + 1; 
            $acs->save();
            break;
        }

        if (is_null($presentCaptchaVal)) {
            return view('user.error_handel_page', compact('captcha', 'account_id', 'user', 'wallet'));
        }

        if (count($captcha) == 0) {
            return view('user.error_handel_page', compact('captcha', 'account_id', 'user', 'wallet'));
        } else
            return view('user.captcha', compact('captcha', 'account_id', 'user', 'wallet', 'presentCaptchaVal'));
    }
    public function store_captcha_point(Request $request)
    {
        // dd($request->user_input_captcha);

        $user = Auth::user();
        $account_id = $user->account_id;
        $data = wallet::where('account_id', $account_id)->first();
        if ($data && ($request->user_input_captcha == $request->code)) {
            $assigncap = assignedCaptcha::find($request->captchaid);

            if ($assigncap) {
                //dd($assigncap->price);
                $assigncap->used = $assigncap->used + 1;
                $assigncap->save();
            }
            toastr()->timeOut(5000)->closeButton()->addSuccess('Your Captcha submit successfully');
            $data->main_balance += floatval($request->price);
            $data->save();
        } else {
            toastr()->timeOut(5000)->closeButton()->addSuccess('Your Captcha is not correct or your wallet is not connect');
        }

        return redirect()->back();
    }
    public function user_profile()
    {
        $user = Auth::user();
        return view('user.setting', compact('user'));
    }
    public function update_profile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        ]);

        // Fetch authenticated user
        $user = Auth::user();

        // Update user's name and email
        $user->name = $request->name;
        $user->email = $request->email;

        // Save the changes

        $user->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('Your Profile updated successfully.');
        return redirect()->back();
    }

    public function package()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();

        $captcha = Captcha::all();
        $package = Package::all();

        return view('user.package', compact('captcha', 'account_id', 'user', 'wallet', 'package'));
    }
    public function buy_package(Request $request, $id)
    {

        $data = package::find($id);
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        return view('user.buy_method', compact('data', 'user', 'account_id', 'wallet'));
    }

    public function buy_next(Request $request, $id)
    {
        // dd($request);
        $data = package::find($id);
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        if ($request->paymentMethod === 'account') {

            if (((float)$wallet->main_balance - (float)$data->price) < 0.0) {

                toastr()->timeOut(5000)->closeButton()->addError('Not sufficient balance to make the purchase.');

                return redirect('/package');
            } else
                return view('user.confirm_buy_package', compact('data', 'user', 'account_id', 'wallet'));
        } else {
            toastr()->timeOut(5000)->closeButton()->addError('Sorry we are currently working on it please try another way.');
            return redirect('package');
        }
    }
    //this is by pressing confirm button
    public function success_buy($id)
    {
        $us = Auth::user();
        $account_id = $us->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $data = package::find($id);

        $wallet->main_balance = ((float)$wallet->main_balance - (float)$data->price);
        $wallet->save();

        //create a new package
        $bp = new boughtPackage();
        $bp->user_id = $us->id;
        $bp->account_id = $us->account_id;
        $bp->type = $data->name;
        $bp->price = $data->price;
        $bp->duration = '90';
        $bp->save();

        $packageId = $bp->id;

        $ac = new AssignedCaptcha();
        $ac->user_id = $us->id;
        $ac->bought_package_id = $packageId;
        $ac->type = $data->name;
        $ac->price = $data->captcha_price;
        $ac->used = 0;
        $ac->start_at = now();
        $ac->expired_at = now()->addHours(24);
        $ac->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('You have successfully purchased ' . $data->name . ' package.');

        return redirect('package');
    }

    //bought package handeling
    public function show_boughtPackage()
    {

        $user = Auth::user();
        if ($user) {
            $account_id = $user->account_id;
            $wallet = Wallet::where('account_id', $account_id)->first();

            $data = boughtPackage::where('account_id', $account_id)->get();
        } else {

            return redirect()->back();
        }

        return view('user.show_bought_package', compact('data', 'wallet', 'account_id', 'user'));
    }

    //this is for main page of team
    public function my_team()
    {

        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $level1 = team::where('parent', $account_id)->pluck('child');
        $level2 = team::whereIn('parent', $level1)->pluck('child');
        $level3 = team::whereIn('parent', $level2)->pluck('child');
        return view('user.my_team', compact('user', 'account_id', 'wallet', 'level1', 'level2', 'level3'));
    }

    //this is for different level team
    public function myTeamInfo($id)
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $level1 = team::where('parent', $account_id)->pluck('child');
        $level2 = team::whereIn('parent', $level1)->pluck('child');
        $level3 = team::whereIn('parent', $level2)->pluck('child');

        return view('user.my_team_info', compact('user', 'account_id', 'wallet', 'level1', 'level2', 'level3', 'id'));
    }


    //this is for see details of my team member
    public function my_team_details(Request $request, $id)
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $package = boughtPackage::where('account_id', $id)->get();
        return view('user.my_team_details', compact('user', 'account_id', 'wallet', 'package'));
    }

    public function collectable()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();

        $allnft = nft::all();
        $size = count($allnft);

        $sugges = suggestion::where('user_id', $user->id)->first();

        if (!$sugges) {
            if ($size > 0) {
                $randomassign = rand(0, $size - 1);
                $assigned = $allnft[$randomassign];
                $newsugg = new suggestion();
                $newsugg->user_id = $user->id;
                $newsugg->nft_id = $assigned->id;
                $newsugg->status = '1';
                $newsugg->start_at = now();
                $newsugg->expired_at = now()->addHours(24);
                $newsugg->save();
                $sugges = $newsugg;
            }
        }
        if ($sugges && $sugges->expired_at < now()) {
            $sugges->status = '1';

            if ($sugges->expired_at instanceof Carbon) {
                $sugges->expired_at = $sugges->expired_at->addHours(24);
            } else {
                $sugges->expired_at = Carbon::parse($sugges->expired_at)->addHours(24);
            }

            $sugges->save();
        }

        if ($sugges && $sugges->status == '0') {
            return view('user.no_nft_today', compact('account_id', 'user', 'wallet'));
        }
        // dd($sugges);
        $nftinfo = isset($sugges->nft_id) ? nft::find($sugges->nft_id) : null;
        // $nftinfo = nft::find($sugges->nft_id);
        return view('user.nft_index', compact('account_id', 'user', 'wallet', 'nftinfo'));
    }

    public function buy_nft(Request $request, $id)
    {
        $sugges = suggestion::where('user_id', $id)->first();

        $nftcode = nft::find($sugges->nft_id);

        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();

        if ($wallet->main_balance < $nftcode->price) {

            toastr()->timeOut(5000)->closeButton()->addError('Sorry You do not have sufficient balance');

            return redirect()->back();
        }
        $wallet->main_balance = $wallet->main_balance - $nftcode->price;
        $wallet->save();

        $sugges->status = '0';
        $sugges->save();

        $myas = new myasset();
        $myas->user_id = $id;
        $myas->nft_code = $nftcode->nft_code;
        $myas->project_name = $nftcode->project_name;
        $myas->price = $nftcode->price;
        $myas->eroi = $nftcode->eroi;
        $myas->duration = $nftcode->duration;
        $myas->start_at = now();
        $myas->save();

        toastr()->timeOut(5000)->closeButton()->addSuccess('You have successfully purchased');
        return redirect()->back();
    }

    public function myasset()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $myasset = myasset::where('user_id', $user->id)->get();

        return view('user.nft_my_asset_list', compact('account_id', 'user', 'wallet', 'myasset'));
    }

    public function asset_details()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $myasset = myasset::where('user_id', $user->id)->get();

        return view('user.nft_asset_details', compact('account_id', 'user', 'wallet', 'myasset'));
    }

    public function stake()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();

        $myasset = myasset::where('user_id', $user->id)->get();

        return view('user.nft_sell_on_market', compact('account_id', 'user', 'wallet', 'myasset'));
    }

    public function sell_nft(Request $request, $id)
    {
        $myasset = Myasset::find($id);

        if (!$myasset) {
            toastr()->error('NFT not found.');
            return redirect()->back();
        }

        $market = new Market();
        $market->user_id = $myasset->user_id;
        $market->nft_code = $myasset->nft_code;
        $market->project_name = $myasset->project_name;
        $market->price = $request->price;
        $market->eroi = $myasset->eroi;
        $market->duration = $myasset->duration;

        if ($market->save()) {
            $myasset->delete();
            // Success message
            toastr()->timeOut(5000)->closeButton()->addSuccess('Successfully added NFT to marketplace.');
        } else {
            toastr()->error('Failed to add NFT to marketplace.');
        }

        return redirect()->back();
    }

    public function market_nft()
    {
        $user = Auth::user();
        $account_id = $user->account_id;
        $wallet = Wallet::where('account_id', $account_id)->first();
        $market = market::all();

        return view('user.nft_market', compact('account_id', 'user', 'wallet', 'market'));
    }
}
