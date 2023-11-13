<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{

    public function feature_view(){
        $data['alldata'] = Feature::get();
        return view('back_end.feature.view_feature',$data);
    }



    public function feature_add(){
        return view('back_end.feature.add_feature');
    }


    public function feature_store(Request $request){

        $request->validate([
         'icon'    => 'required',
         'heading' => 'required',
         'status' => 'required'
        ]);

        $data =new Feature();
        $data->icon       = $request->icon;
        $data->heading	  = $request->heading;
        $data->detalis    = $request->detalis;
        $data->status	  = $request->status;
        $data->save();

        return redirect()->route('feature.view')->with('success','Data Added Successfully');
    }


    public function feature_edit($id){
        $data['alldata']= Feature::where('id',$id)->first();
        return view('back_end.feature.edit_feature',$data);
    }



    public function feature_update(Request $request ,$id){

        $request->validate([
         'icon'    => 'required',
         'heading' => 'required',
         'status' => 'required'
        ]);

        $data = Feature::where('id',$id)->first();
        $data = Feature::find($id);

        $data->icon       = $request->icon;
        $data->heading	  = $request->heading;
        $data->detalis    = $request->detalis;
        $data->status	  = $request->status;

        $data->update();
        return redirect()->route('feature.view')->with('success','Data Update Successfully');
    }


    public function feature_active($id){
        Feature::find($id)->where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function feature_inactive($id){
        Feature::find($id)->where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }



    public function feature_delete($id){

        $data = Feature::find($id);
        $data->delete();
        return redirect()->back()->with('Success','Slider Is Delated Successfully');

    }





}
