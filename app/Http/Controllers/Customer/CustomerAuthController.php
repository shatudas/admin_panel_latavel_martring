<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Mail\Websitemail;
use Auth;
use Mail;
use Hash;

class CustomerAuthController extends Controller
{

  //------ customer login-------//
  public function customer_login(){
    return view ('front_end.page.singin');
  }


  //--------customer login submit------//
  public function customer_login_submit(Request $request){

   $request->validate([
    'email'    => 'required|email',
    'password' => 'required'
   ]);

   $credentials = [
    'email'    => $request->email,
    'password' => $request->password
   ];

   if (Auth::guard('customer')->attempt($credentials)) {
    $customer_data = Customer::where('email', $request->email)->first();
    if ($customer_data->status == 0) {
     return redirect()->route('customer.home');
    }
    else {
     return redirect()->route('customer.login')->with('error', 'Your Accounts not varified');
    }
    }else{
    return redirect()->route('customer.login')->with('error', 'Credentials not matched');
    }

   }


   //-----------customer logout--------//
   public function customer_logout(){
    Auth::guard('customer')->logout();
    return redirect()->route('home');
   }


   //----------customer singup------//
   public function customer_singup(){
    return view ('front_end.page.singup');
   }

   //---------customer singup submit--------//
   public function customer_singup_submit(Request $request){

     $request->validate([
      'name'             =>'required',
      'email'            =>'required|email|unique:customers',
      'password'         => 'required',
      'retype_password'  =>'required|same:password'
     ]);

    $password = Hash::make($request->password);
    $token    = md5('resetpassowrd' . time());
    $reset_link = url('/customer-verification/'.$request->email.'/'.$token);

    //------ data store------//
    $data =new Customer();
    $data->name     = $request->name;
    $data->email    = $request->email;
    $data->password	= $password;
    $data->token	= $token;
    $data->status	= '1';
    $data->save();

    //----------mail send------//
    $subject ='Sing Up Verification <br>';
    $message ='Please following the link to confirm sing up process:<br>';
    $message .= '<a href="'.$reset_link.'">Click Here</a>';
    Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->back()->with('success','Complate the singup, Please Check your email & click the link');

   }

   //---------customer mail verification----------//
   public function customer_verification($email, $token ){

    $varification_data = Customer::where('token',$token)->where('email',$email)->first();

    if($varification_data){
     $varification_data->token  = '';
     $varification_data->status = '0';
     $varification_data->update();
     return redirect()->route('customer.login')->with('success','Your Accounts Is Verficat');
     }
     else
     {
      return redirect()->route('customer.singup');
     }
   }


   //---------customer forget password---------//
   public function customer_forgat_password(){
    return view ('front_end.page.forget_password');
   }


   //-------customer forget password submit------//
   public function customer_forgat_password_submit(Request $request){

    $request->validate([
     'email'    => 'required'
    ]);

    $customer_data = Customer::where('email',$request->email)->first();
    if(!$customer_data){
     return redirect()->back()->with('error','Email Address Not Found!');
    }

    $token = md5('customer_reset_passowrd' . time());
    $customer_data->token = $token;
    $customer_data->update();

    $reset_link = url('/forget-password/'.$token.'/'.$request->email);

    $subject ='Reset Password';
    $message ='Please Click  on the following link:<br>';
    $message .= '<a href="'.$reset_link.'">Click Here</a>';

    Mail::to($request->email)->send(new Websitemail($subject, $message));

    return redirect()->route('customer.login')->with('success','Pleace Chack The Email & Follow There Step');

  }

 //-------customer forget password submit------//
 public function customer_reset_password($token, $email){

    dd('ok');

    $customer_data =Customer::where('token',$token)->where('email',$email)->first();
    if(!$customer_data){
        return redirect()->route('customer.login');
    }
    return view('front_end.page.reset_password',compact('token','email'));
 }










}
