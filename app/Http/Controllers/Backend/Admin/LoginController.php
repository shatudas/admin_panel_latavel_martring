<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;
use App\Mail\Websitemail;

class LoginController extends Controller
{

    public function admin_login(){
        return view ('back_end.login.login');
    }


    public function forgat_password(){
        return view ('back_end.login.forget-password');
    }


    public function forgat_password_submit(Request $request){

        $request->validate([
         'email'    => 'required'
        ]);

        $admin_data = Admin::where('email',$request->email)->first();
        if(!$admin_data){
         return redirect()->back()->with('error','Email Address Not Found!');
        }

        $token = md5('resetpassowrd' . time());
        $admin_data->token = $token;
        $admin_data->update();


        $reset_link = url('admin/forget-password/'.$token.'/'.$request->email);

        $subject ='Reset Password';
        $message ='Please Click  on the following link:<br>';
        $message .= '<a href="'.$reset_link.'">Click Here</a>';


        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->route('admin.login')->with('success','Pleace Chack The Email & Follow The Step');

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



    public function reset_password($token,$email){

        $admin_data =Admin::where('token',$token)->where('email',$email)->first();
        if(!$admin_data){
            return redirect()->route('admin.login');
        }

        return view('Back_end.login.reset_password',compact('token','email'));
    }


    public function admin_reset_password(Request $request){

        $request->validate([
            'password'        => 'required',
            'retype_password' =>'required|same:password'
        ]);

        $admin_data = Admin::where('token',$request->token)->where('email',$request->email)->first();
        $admin_data->password = Hash::make($request->password);
        $admin_data->token = '';
        $admin_data->update();

        return redirect()->route('admin.login')->with('success','Password Reset SuccessFull');

    }

}
