<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Auth;
use Hash;


class CustomerAuthController extends Controller
{

    public function customer_login(){
        return view ('front_end.page.login');
    }


    public function customer_login_submit(Request $request){

        $request->validate([
            'email'    => 'required|email|',
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


    public function customer_singup_submit(Request $request){

        $request->validate([
            'name'             =>'required',
            'email'            =>'required|email|unique:customers',
            'password'         => 'required',
            'retype_password'  =>'required|same:password'
        ]);

        $password = Hash::make($request->password);
        $token = md5('resetpassowrd' . time());

        $reset_link = url('/customer-verification/'.$request->email.'/'.$token);

        $data =new Customer();
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->password	= $password;
        $data->token	= $token;
        $data->status	= 1;
        $data->save();

        $subject ='Sing Up Verification';
        $message ='Please Click  on the following link to Confirm sing Up process:<br>';
        $message .= '<a href="'.$reset_link.'">Click Here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $message));
        return redirect()->back()->with('success','To Complate the singup, Please Check your email & click the link');

    }


    public function customer_verification($email, $token ){


    $varification_data = Customer::where('token',$token)->where('email',$email)->first();

     if($varification_data){
       $varification_data->token  = '';
       $varification_data->status = '0';
       $varification_data->update();

       return redirect()->route('customer.login')->with('success','Your Accounts Is Verficat');

     }else{
      return redirect()->route('customer.singup');
     }


   }




}
