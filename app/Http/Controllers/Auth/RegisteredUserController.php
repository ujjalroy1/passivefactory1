<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\passwordMail;
use App\Models\wallet;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    //generate account id
    private function generateNextAccountId()
    {
        do {
            $randomAccountId = rand(10000000, 99999999);
    
            $exists = User::where('account_id', $randomAccountId)->exists();
    
        } while ($exists); 
    
        return $randomAccountId;
    }
    
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'mobile' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $accountId = $this->generateNextAccountId();//call the account_id
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'referral_code' => $request->ref_code,
            'account_id' => $accountId,
            'password' => Hash::make($request->password),
        ]);
        
        //this for mail
        $to=$request->email;
        $sub="Your password";
        $pass=$request->password;
        Mail::to($to)->send(new passwordMail($pass,$sub));

        //this for create a wallet
        $wallet=new wallet();
        $wallet->user_id = $user->id;
        $wallet->account_id=$accountId;
        $wallet->main_balance=0.0;
        $wallet->bonus=0.0;
        $wallet->refer=0.0;
        $wallet->gift=0.0;
        $wallet->cash_back=0.0;
        $wallet->save();
        
        event(new Registered($user));

        Auth::login($user);

        return redirect('home');
    }
}
