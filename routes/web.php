<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\LoginController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Frontend\Layout\HomeController;
use App\Http\Controllers\Backend\Admin\SliderController;
use App\Http\Controllers\Backend\Admin\FeatureController;



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


Route::group(['middleware'=>'admin:admin'],function(){

//------profile-----------//
Route::get('admin/profile',[ProfileController::class,'admin_profile'])->name('admin.profile');
Route::post('admin/profile/update',[ProfileController::class,'admin_profile_update'])->name('admin.profile.update');


//---------Slider---------//
Route::get('slider/view',[SliderController::class,'slide_view'])->name('slider.view');
Route::get('slider/add',[SliderController::class,'slide_add'])->name('slider.add');
Route::post('slider/store',[SliderController::class,'slide_store'])->name('slider.store');
Route::get('slider/edit/{id}',[SliderController::class,'slide_edit'])->name('slider.edit');
Route::post('slider/update/{id}',[SliderController::class,'slide_update'])->name('slider.update');
Route::get('slider/active/{id}',[SliderController::class,'slide_active'])->name('slider.active');
Route::get('slider/inactive/{id}',[SliderController::class,'slide_inactive'])->name('slider.inactive');
Route::get('slider/delete/{id}',[SliderController::class,'slide_delete'])->name('slider.delete');


//---------Feature---------//
Route::get('feature/view',[FeatureController::class,'feature_view'])->name('feature.view');
Route::get('feature/add',[FeatureController::class,'feature_add'])->name('feature.add');
Route::post('feature/store',[FeatureController::class,'feature_store'])->name('feature.store');
Route::get('feature/edit/{id}',[FeatureController::class,'feature_edit'])->name('feature.edit');
Route::post('feature/update/{id}',[FeatureController::class,'feature_update'])->name('feature.update');
Route::get('feature/active/{id}',[FeatureController::class,'feature_active'])->name('feature.active');
Route::get('feature/inactive/{id}',[FeatureController::class,'feature_inactive'])->name('feature.inactive');
Route::get('feature/delete/{id}',[FeatureController::class,'feature_delete'])->name('feature.delete');

});
