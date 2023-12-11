<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Hash;
use Mail;


class SubscriberController extends Controller
{

 public function send_email(Request $request){

   $validator = \Validator ::make($request->all(),[
    'email'   => 'required|email'
   ]);

   if(!$validator->passes())
    {
    return response()->json(['code'=>0, 'error_message'=>$validator->errors()->toArray()]);
    }
    else
    {
      $token =  bcrypt('token');
      $obj = new Subscriber();
      $obj->email  = $request->email;
      $obj->token  = $token;
      $obj->status = 0;
      $obj->save();

      $varification_link = url('/subscriber/varify/'.$request->email.'/'.$token);

      $subject = 'Subscriber Verification';
      $massage = 'Please Click On The Link Below To Confirm Subcripction';
      $massage .= '<a href="'.$varification_link.'" >';
      $massage .= '<br>Varification';
      $massage .= '</a>';

      Mail::to($request->email)->send(new Websitemail($subject,$massage));

    return response()->json(['code'=>1,'success_message'=>'Please check your email to confirm subcriction']);
    }
  }


    public function varify($email, $token){

     $subscriber_data = Subscriber::where('email',$email)->where('token',$token)->first();

     if($subscriber_data){
       $subscriber_data->token  = '';
       $subscriber_data->status =  1;
       $subscriber_data->update();

       return redirect()->route('home')->with('success','Your Subscription Is Varified Successfull !');

     }else{
      return redirect()->route('home');
     }


    }





}
