<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Controllers\Backend\Admin\LoginController;
use Hash;
use Auth;
use App\Mail\Websitemail;


class LoginController extends Controller
{
    public function admin_login(){
        return view ('back_end.login.login');
    }

    public function forgat_password(){
        return view ('back_end.login.forget-password');
    }



    public function admin_login_submit(Request $request){

        $request->validate([
            'email'    => 'required|email',
            'password' =>'required'
        ]);


        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin.home');
        }
        else
        {
            return redirect()->route('admin.login')->with('error','credential Not Match');
        }
      }

    public function admin_logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
