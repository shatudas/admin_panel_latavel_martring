<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;
use Hash;


class CustomerProfileController extends Controller
{


  public function customer_profile(){
    return view ('customer.profile.edit_profile');
  }


  public function customer_profile_update(Request $request){

    $customer_data =Customer::where('email',Auth::guard('customer')->user()->email)->first();

    $request->validate([
     'name'     => 'required',
     'email'    => 'required|email',
    ]);

    if($request->password!=''){
     $request->validate([
      'password'         => 'required',
      'retype_password'  => 'required|same:password'
      ]);
     $customer_data->password = Hash::make($request->password);
    }

    if($request->hasFile('photo')){

     $request->validate([
      'photo' => 'image|mimes:jpg,jpeg,png,git'
     ]);

     @unlink(public_path('upload/customer_profile/'.$customer_data->photo));

     $ext        = $request->file('photo')->extension();
     $final_name = 'customer'.'.'.$ext;
     $request->file('photo')->move(public_path('upload/customer_profile/'),$final_name);
     $customer_data->photo = $final_name;
    }

    $customer_data->name    = $request->name;
    $customer_data->email   = $request->email;
    $customer_data->phone   = $request->phone;
    $customer_data->country = $request->country;
    $customer_data->address = $request->address;
    $customer_data->state   = $request->state;
    $customer_data->city    = $request->city;
    $customer_data->zip     = $request->zip;

    $customer_data->update();

    return redirect()->back()->with('error','Profile Updated Successfully');

   }




}
