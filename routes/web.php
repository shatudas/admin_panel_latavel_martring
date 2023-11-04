<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminController;






//_______backend part__________//
Route::get('admin/home',[AdminController::class,'admin_home'])->name('admin.home');




Route::get('/', function () {
    return view('welcome');
});
