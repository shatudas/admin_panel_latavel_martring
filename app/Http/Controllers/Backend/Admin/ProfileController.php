<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function admin_profile(){
        return view ('back_end.Profile.edit_profile');
    }


    public function admin_profile_update(Request $request){

     $admin_data =Admin::where('email',Auth::guard('admin')->user()->email)->first();

     $request->validate([
      'name'     => 'required',
      'email'    => 'required|email',
     ]);

     if($request->password!=''){
      $request->validate([
       'password'         => 'required',
       'retype_password'  => 'required|same:password'
       ]);
      $admin_data->password = Hash::make($request->password);
     }

     if($request->hasFile('photo')){


      $request->validate([
       'photo' => 'image|mimes:jpg,jpeg,png,git'
      ]);

      @unlink(public_path('upload/profile/'.$admin_data->photo));

      $ext        = $request->file('photo')->extension();
      $final_name = 'admin'.'.'.$ext;
      $request->file('photo')->move(public_path('upload/profile/'),$final_name);
      $admin_data->photo = $final_name;

     }

     $admin_data->name  = $request->name;
     $admin_data->email = $request->email;
     $admin_data->update();

     return redirect()->back()->with('error','Profile Updated Successfully');

    }
}
