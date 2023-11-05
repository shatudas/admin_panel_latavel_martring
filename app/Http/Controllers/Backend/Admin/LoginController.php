<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function admin_login(){
        return view ('back_end.login.login');
    }

    public function forgat_password(){
        return view ('back_end.login.forget-password');
    }
}
