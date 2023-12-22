<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Hash;
use App\Mail\Websitemail;


class CustomerAuthController extends Controller
{

    public function customer_login(){
        return view ('front_end.page.login');
    }


    public function customer_login_submit(Request $request){

        $request->validate([
            'email'    => 'required|email',
            'password' =>'required'
        ]);


        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('customer')->attempt($credential)){
            return redirect()->route('customer.home');
        }
        else
        {
            return redirect()->route('customer.login')->with('error','credential Not Match');
        }
      }

      public function customer_singup(){
        return view ('front_end.page.singup');
    }


    public function customer_logout(){
        Auth::guard('customer')->logout();
        return redirect()->route('home');
    }


}
