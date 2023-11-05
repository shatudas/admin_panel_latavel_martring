<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Admin\LoginController;






//_______backend part__________//
Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home');
Route::get('admin/login',[LoginController::class,'admin_login'])->name('login.home');
Route::get('admin/forget-password',[LoginController::class,'forgat_password'])->name('forget.password');





Route::get('/', function () {
    return view('welcome');
});
