<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\LoginController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Frontend\Layout\HomeController;
use App\Http\Controllers\Backend\Admin\SliderController;


//_______frontend end__________//
Route::get('/',[HomeController::class,'index'])->name('home');

//_______backend part__________//

//--------admin login-------//
Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home')->middleware('admin:admin');
Route::get('admin/login',[LoginController::class,'admin_login'])->name('admin.login');
Route::post('admin/login-submit',[LoginController::class,'admin_login_submit'])->name('admin.login-submit');
Route::get('admin/logout',[LoginController::class,'admin_logout'])->name('admin.logout');
Route::get('admin/forget-password',[LoginController::class,'forgat_password'])->name('forget.password');
Route::post('admin/forget/password/submit',[LoginController::class,'forgat_password_submit'])->name('admin.forget.password.submit');
Route::get('admin/forget-password/{token}/{email}',[LoginController::class,'reset_password'])->name('admin.reset.password');
Route::post('admin/reset/password',[LoginController::class,'admin_reset_password'])->name('admin.reset.password');

//------profile-----------//
Route::get('admin/profile',[ProfileController::class,'admin_profile'])->name('admin.profile');
Route::post('admin/profile/update',[ProfileController::class,'admin_profile_update'])->name('admin.profile.update');


//---------Slider---------//
Route::get('slider/view',[SliderController::class,'slide_view'])->name('slider.view');
