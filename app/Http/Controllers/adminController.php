<?php

namespace App\Http\Controllers;

use App\Models\Captcha;
use App\Models\nft;
use App\Models\Package;
use App\Models\project;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function admin_home()
    {

        return view('admin.index');
    }
    public function add_captcha()
    {

        return view('admin.add_captcha');
    }
    public function upload_captcha(Request $request)
    {
        $data=new Captcha;
        $data->title=$request->title;
        $data->code=$request->captcha;
        $data->price='0';
        
        $img=$request->image;
        if($img)
        {
           $imgname=time().'.'.$img->getClientOriginalExtension();
           $request->image->move('captcha_photo',$imgname);
           $data->image=$imgname;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->addSuccess('Captcha added successfully.');

        return redirect()->back();

    }
   public function add_package()
   {
        return view('admin.add_package');
   }
  public function upload_package(Request $request)
  {

       $data=new Package;
       $data->name=$request->name;
       $data->price=$request->price;
       $data->captcha_price=$request->cpprice;
       $data->benifit=$request->benifit;
       $data->save();
       toastr()->timeOut(5000)->closeButton()->addSuccess('package added successfully.');

      return redirect()->back();

  }
  public function manage_captcha()
  {

     $captcha=Captcha::all();
     return view('admin.manage_captcha',compact('captcha'));

  }
  public function edit_captcha($id)
  {
      $captcha=Captcha::find($id);
      //dd($captcha);
      return view('admin.edit_captcha',compact('captcha'));

  }
  public function upload_edit_captcha(Request $request,$id)
  {
    $captcha1=Captcha::find($id);
    $img_path=public_path('captcha_photo/'.$captcha1->image);
    if(file_exists($img_path))
    {
          unlink($img_path);
    }
    $captcha1->title=$request->title;
    $captcha1->code=$request->captcha;
    // $captcha1->price=$request->price;
    $img=$request->image;
    if($img)
    {
        $imgname=time().'.'.$img->getClientOriginalExtension();
        $img->move('captcha_photo',$imgname);
        $captcha1->image=$imgname;
    }
    $captcha1->save();
    $captcha=Captcha::all();
    toastr()->timeOut(5000)->closeButton()->addSuccess('one row Edited successfully.');

    return redirect('admin/manageCaptcha');

  }

  public function manage_package()
  {

      $package=Package::all();

      return view('admin.manage_package',compact('package'));
       
  }
  public function delete_captcha($id)
  {

    $data=Captcha::find($id);
    $img_path=public_path('captcha_photo/'.$data->image);
    if(file_exists($img_path))
    {
        unlink($img_path);
    }
    $data->delete();

    toastr()->timeOut(5000)->closeButton()->addWarning('captcha deleted successfully.');
    return redirect()->back();
  }
  public function delete_package($id)
  {
    $data=Package::find($id);
    $data->delete();
    toastr()->timeOut(5000)->closeButton()->addWarning('one package deleted successfully.');
    return redirect()->back();
  }
  public function edit_package($id)
  {

      $package=Package::find($id);
      return view('admin.edit_package',compact('package'));

  }
  public function upload_edit_package(Request $request,$id)
  {

    $data=Package::find($id);
    $data->name=$request->name;
    $data->price=$request->price;
    $data->captcha_price=$request->cpprice;
    $data->benifit=$request->benifit;

    $data->save();
    toastr()->timeOut(5000)->closeButton()->addSuccess('one row Edited successfully.');

    return redirect('admin/managePackage');
     

  }
  public function add_project()
  {

      return view('admin.add_project');
  }
  public function store_add_project(Request $request)
  {
      $data=new project();
      $data->project_name=$request->name;
      $data->save();
      toastr()->timeOut(5000)->closeButton()->addSuccess('one Project Add successfully.');

      return redirect()->back();


  }
  public function add_nft()
  {

      $project=project::all();
      return view('admin.add_nft',compact('project'));


  }

  public function store_nft(Request $request)
  {
    do {
        $randomnft = rand(100000, 999999);

        $exists = nft::where('nft_code', $randomnft)->exists();

    } while ($exists); 
   $nftstore=new nft();
   $nftstore->nft_code=$randomnft;
   $nftstore->project_name=$request->project_name;
   $nftstore->price=$request->price;
   $nftstore->eroi=$request->eroi;
   $nftstore->duration=$request->duration;
   toastr()->timeOut(5000)->closeButton()->addSuccess('one NFT Add successfully.');

   $nftstore->save();
   return redirect()->back();
   
  }





}
