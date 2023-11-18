<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{



    public function video_view(){
        $data['alldata'] = Video::get();
        return view('back_end.video.view_video',$data);
    }


    public function video_add(){
        return view('back_end.video.add_video');
    }



    public function video_store(Request $request){

        $request->validate([
         'Video_id' => 'required',
         'status'   => 'required'
        ]);

        $data =new Video();
        $data->Video_id  = $request->Video_id;
        $data->heading   = $request->heading;
        $data->status	   = $request->status;
        $data->save();

        return redirect()->route('video.view')->with('success','Data Added Successfully');
    }


    public function video_edit($id){
     $data['alldata']= Video::where('id',$id)->first();

     return view('back_end.video.edit_video',$data);
 }



    public function video_update(Request $request ,$id){

     $request->validate([
      'Video_id' => 'required',
      'status'   => 'required'
     ]);

      $data = Video::where('id',$id)->first();
      $data->Video_id  = $request->Video_id;
      $data->heading   = $request->heading;
      $data->status	   = $request->status;

      $data->update();

      return redirect()->route('video.view')->with('success','Data Update Successfully');
    }


    public function video_active($id){
     Video::find($id)->where('id',$id)->update(['status'=>0]);
     return redirect()->back();
    }

     public function video_inactive($id){
      Video::find($id)->where('id',$id)->update(['status'=>1]);
      return redirect()->back();
     }


     public function video_delete($id){

      $data =  Video::where('id',$id)->first();
      $data->delete();
      return redirect()->back()->with('Success','Data Is Delated Successfully');

  }






}
