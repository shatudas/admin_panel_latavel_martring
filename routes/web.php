<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\LoginController;

//_______backend part__________//
Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home')->middleware('admin:admin');
Route::get('admin/login',[LoginController::class,'admin_login'])->name('admin.login');
Route::post('admin/login-submit',[LoginController::class,'admin_login_submit'])->name('admin.login-submit');
Route::get('admin/logout',[LoginController::class,'admin_logout'])->name('admin.logout');
Route::get('admin/forget-password',[LoginController::class,'forgat_password'])->name('forget.password');





Route::get('/', function () {
    return view('welcome');
});
