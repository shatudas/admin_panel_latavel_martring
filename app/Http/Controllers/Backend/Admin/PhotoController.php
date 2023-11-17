<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function photo_view(){
        $data['alldata'] = Photo::get();
        return view('back_end.photo.view_photo',$data);
    }


    public function photo_add(){
        return view('back_end.photo.add_photo');
    }


    public function photo_store(Request $request){

        $request->validate([
         'status' => 'required',
         'image' => 'required|image|mimes:jpg,jpeg,png,git'
        ]);


        $ext        = $request->file('image')->extension();
        $final_name = time().'.'.$ext;
        $request->file('image')->move(public_path('upload/photo/'),$final_name);

        $data =new Photo();

        $data->content  = $request->content;
        $data->status	= $request->status;
        $data->image    = $final_name;
        $data->save();

        return redirect()->route('photo.view')->with('success','Data Added Successfully');
    }



    public function photo_edit($id){
        $data['alldata']= Photo::where('id',$id)->first();
        return view('back_end.photo.edit_photo',$data);
    }



    public function photo_update(Request $request ,$id){

        $data = Photo::where('id',$id)->first();

        if($request->hasFile('image')){

            $request->validate([
            'status' => 'required',
             'image' => 'image|mimes:jpg,jpeg,png,git'
            ]);

            unlink(public_path('upload/photo/'.$data->image));
            $ext        = $request->file('image')->extension();
            $final_name = time().'.'.$ext;
            $request->file('image')->move(public_path('upload/photo/'),$final_name);
            $data->image = $final_name;
           }

            $data->content  = $request->content;
            $data->status	= $request->status;

            $data->update();

            return redirect()->route('photo.view')->with('success','Data Update Successfully');
    }



    public function photo_active($id){
        Photo::find($id)->where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }

    public function photo_inactive($id){
        Photo::find($id)->where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }


    public function photo_delete($id){

        $data =  Photo::where('id',$id)->first();
        unlink(public_path('upload/photo/'.$data->image));
        $data->delete();
        return redirect()->back()->with('Success','Data Is Delated Successfully');

    }




}
