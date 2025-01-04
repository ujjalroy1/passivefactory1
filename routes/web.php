<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//all routes for user
Route::get('/dashboard', [HomeController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',[HomeController::class,'home'])->middleware(['auth', 'verified']);
Route::get('/home',[HomeController::class,'home'])->middleware(['auth', 'verified'])->name('home');
Route::get('/captcha1',[HomeController::class,'captcha'])->middleware(['auth', 'verified'])->name('captcha1');
Route::post('/store_captcha_point',[HomeController::class,'store_captcha_point'])->middleware(['auth', 'verified']);
Route::get('/settings',[HomeController::class,'user_profile'])->middleware(['auth', 'verified'])->name('profile');
Route::post('/update_profile',[HomeController::class,'update_profile'])->middleware(['auth', 'verified']);
Route::get('/package',[HomeController::class,'package'])->middleware(['auth', 'verified'])->name('package');
Route::post('buyPackage/{id}',[HomeController::class,'buy_package'])->middleware(['auth', 'verified']);
Route::post('buy/next/{id}',[HomeController::class,'buy_next'])->middleware(['auth', 'verified']);
Route::post('success/buy/{id}',[HomeController::class,'success_buy'])->middleware(['auth', 'verified']);
Route::get('boughtPackage',[HomeController::class,'show_boughtPackage'])->middleware(['auth', 'verified'])->name('boughtPackage');
Route::get('myTeam',[HomeController::class,'my_team'])->middleware(['auth', 'verified'])->name('myTeam');
Route::get('myTeamInfo/{id}',[HomeController::class,'myTeamInfo'])->middleware(['auth', 'verified']);
Route::post('myTeamDetails/{id}',[HomeController::class,'my_team_details'])->middleware(['auth', 'verified']);
Route::get('collectable',[HomeController::class,'collectable'])->middleware(['auth', 'verified'])->name('collectable');
Route::post('buyNFT/{id}',[HomeController::class,'buy_nft'])->middleware(['auth', 'verified']);
Route::get('myasset',[HomeController::class,'myasset'])->middleware(['auth', 'verified'])->name('home');
Route::get('assetDetails',[HomeController::class,'asset_details'])->middleware(['auth', 'verified'])->name('home');
Route::get('stake',[HomeController::class,'stake'])->middleware(['auth', 'verified'])->name('home');
Route::post('sellnft/{id}',[HomeController::class,'sell_nft'])->middleware(['auth', 'verified']);
Route::get('marketnft',[HomeController::class,'market_nft'])->middleware(['auth', 'verified'])->name('home');


//all routes for admin
Route::get('admin/home',[adminController::class,'admin_home'])->middleware(['auth', 'admin']);
Route::get('admin/addCaptcha',[adminController::class,'add_captcha'])->middleware(['auth', 'admin']);
Route::post('admin/uploadCaptcha',[adminController::class,'upload_captcha'])->middleware(['auth', 'admin']);
Route::get('admin/addPackage',[adminController::class,'add_package'])->middleware(['auth', 'admin']);
Route::post('admin/uploadPackage',[adminController::class,'upload_package'])->middleware(['auth', 'admin']);
Route::get('admin/manageCaptcha',[adminController::class,'manage_captcha'])->middleware(['auth', 'admin']);
Route::get('admin/editCaptcha/{id}',[adminController::class,'edit_captcha'])->middleware(['auth', 'admin']);
Route::post('admin/uploadEditCaptcha/{id}',[adminController::class,'upload_edit_captcha'])->middleware(['auth', 'admin']);
Route::get('admin/managePackage',[adminController::class,'manage_package'])->middleware(['auth', 'admin']);
Route::get('admin/deleteCaptcha/{id}',[adminController::class,'delete_captcha'])->middleware(['auth', 'admin']);
Route::get('admin/deletePackage/{id}',[adminController::class,'delete_package'])->middleware(['auth', 'admin']);
Route::get('admin/editPackage/{id}',[adminController::class,'edit_package'])->middleware(['auth', 'admin']);
Route::post('admin/uploadEditPackage/{id}',[adminController::class,'upload_edit_package'])->middleware(['auth', 'admin']);
Route::get('admin/addProject',[adminController::class,'add_project'])->middleware(['auth', 'admin']);
Route::post('admin/storeAddProject',[adminController::class,'store_add_project'])->middleware(['auth', 'admin']);
Route::get('admin/addNFT',[adminController::class,'add_nft'])->middleware(['auth', 'admin']);
Route::post('admin/storeNFT',[adminController::class,'store_nft'])->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';
