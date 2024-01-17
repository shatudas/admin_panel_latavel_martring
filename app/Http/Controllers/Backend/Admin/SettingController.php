<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Auth;

class SettingController extends Controller
{

    public function setting(){
        $data['setting']= Setting::where('id',1)->first();
        return view('back_end.setting.setting',$data);

    }


    public function setting_update(Request $request){

        $obj = Setting::where('id',1)->first();


        if($request->hasFile('logo')){
            $request->validate([
                'logo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            @unlink(public_path('upload/setting/'.$obj->logo));
            $ext = $request->file('logo')->extension();
            $final_name = 'logo'.time().'.'.$ext;
            $request->file('logo')->move(public_path('upload/setting/'),$final_name);
            $obj->logo = $final_name;
        }


        if($request->hasFile('favicon')){
            $request->validate([
                'favicon' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            @unlink(public_path('upload/setting/'.$obj->favicon));
            $ext = $request->file('favicon')->extension();
            $final_name = 'favicon'.time().'.'.$ext;
            $request->file('favicon')->move(public_path('upload/setting/'),$final_name);
            $obj->favicon = $final_name;
        }


        $obj->name                    = $request->name;
        $obj->title                   = $request->title;
        $obj->top_bar_phone           = $request->top_bar_phone;
        $obj->top_bar_email           = $request->top_bar_email;
        $obj->home_feature_status     = $request->home_feature_status;
        $obj->home_room_total         = $request->home_room_total;
        $obj->home_room_status        = $request->home_room_status;
        $obj->home_testimonial_status = $request->home_testimonial_status;
        $obj->home_total_post         = $request->home_total_post;
        $obj->home_post_status        = $request->home_post_status;
        $obj->footer_phone            = $request->footer_phone;
        $obj->footer_email            = $request->footer_email;
        $obj->footer_address          = $request->footer_address;
        $obj->footer_copy_right       = $request->footer_copy_right;
        $obj->facebook                = $request->facebook;
        $obj->twitter                 = $request->twitter;
        $obj->linkedin                = $request->linkedin;
        $obj->pinterest               = $request->pinterest;
        $obj->analytic_id             = $request->analytic_id;
        $obj->theme_color             = $request->theme_color;

        $obj->update();

        return redirect()->back()->with('success', 'Setting is updated successfully.');


    }


}
