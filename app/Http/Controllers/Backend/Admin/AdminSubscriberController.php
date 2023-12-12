<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Mail;

class AdminSubscriberController extends Controller
{


    public function subscriber_show(){
      $subscriber = Subscriber::where('status',1)->get();
      return view('back_end.page.subscriber',compact('subscriber'));
    }


    public function send_email(){
     return view('back_end.page.subscriber_send_mail');
    }

    public function send_email_submit(Request $request){

     $request->validate([
       'subject' => 'required',
       'message' => 'required'
      ]);

      $subject = $request->subject;
      $message = $request->message;

      $all_serscriber = Subscriber::where('status',1)->get();

      foreach($all_serscriber as $item){
       Mail::to($item->email)->send(new Websitemail($subject, $message));

      }

      return redirect()->back()->with('success','Data Update Successfully');



    }






}
