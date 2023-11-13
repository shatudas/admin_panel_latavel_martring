<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{

    public function slide_view(){
        $data['alldata'] = Slider::get();
        return view('back_end.slider.view_silder',$data);
    }



    public function slide_add(){
        return view('back_end.slider.add_silder');
    }



    public function slide_store(Request $request){

        $request->validate([
         'image' => 'required|image|mimes:jpg,jpeg,png,git'
        ]);


        $ext        = $request->file('image')->extension();
        $final_name = time().'.'.$ext;
        $request->file('image')->move(public_path('upload/slider/'),$final_name);

        $data =new Slider();
        $data->image       = $final_name;
        $data->title       = $request->title;
        $data->subtitle	   = $request->subtitle	;
        $data->button_text = $request->button_text;
        $data->button_url  = $request->button_url;
        $data->status	   = $request->status;
        $data->save();

        return redirect()->route('slider.view')->with('success','Data Added Successfully');
    }



    public function slide_edit($id){
        $data['alldata']= Slider::where('id',$id)->first();
        return view('back_end.slider.edit_silder',$data);
    }



    public function slide_update(Request $request ,$id){

        $data = Slider::where('id',$id)->first();

        if($request->hasFile('image')){

            $request->validate([
             'image' => 'image|mimes:jpg,jpeg,png,git'
            ]);

            unlink(public_path('upload/slider/'.$data->image));
            $ext        = $request->file('image')->extension();
            $final_name = time().'.'.$ext;
            $request->file('image')->move(public_path('upload/slider/'),$final_name);
            $data->image = $final_name;
           }

            $data->title       = $request->title;
            $data->subtitle	   = $request->subtitle	;
            $data->button_text = $request->button_text;
            $data->button_url  = $request->button_url;
            $data->status	   = $request->status;

            $data->update();

            return redirect()->route('slider.view')->with('success','Data Update Successfully');
    }


    public function slide_active($id){
        Slider::find($id)->where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function slide_inactive($id){
        Slider::find($id)->where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }


    public function slide_delete($id){

        $data = Slider::where('id',$id)->first();
        unlink(public_path('upload/slider/'.$data->image));
        $data->delete();
        return redirect()->back()->with('Success','Slider Is Delated Successfully');

    }



}
