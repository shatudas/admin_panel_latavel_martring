<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;
use App\Models\Room_Photo;


class RoomController extends Controller
{



    public function room_view(){
     $data['alldata'] = Room::get();
     return view('back_end.hotal_room.room_view',$data);
    }


    public function room_add(){
     $amenity =Amenity::where('status','0')->get();
     return view('back_end.hotal_room.room_add',compact('amenity'));
    }


    public function room_store(Request $request){

     $amenities ='';
     $i = 0;

     if(isset($request->amenities)){
      foreach($request->amenities as $item){
       if($i==0){
        $amenities .= $item;
       }
       else{
       $amenities .= ','.$item;
       }
       $i++;
      }
     }

     $request->validate([
      'name'           => 'required',
      'description'    => 'required',
      'price'          => 'required',
      'total_room'     => 'required',
      'total_bad'      => 'required',
      'total_bathroom' => 'required',
      'total_guest'    => 'required',
      'featured_photo' => 'required|image|mimes:jpg,jpeg,png,git'
     ]);

     $ext        = $request->file('featured_photo')->extension();
     $final_name = time().'.'.$ext;
     $request->file('featured_photo')->move(public_path('upload/room/'),$final_name);

     $data =new Room();

     $data->name            = $request->name;
     $data->description     = $request->description;
     $data->price	       = $request->price;
     $data->total_room      = $request->total_room;
     $data->amenities       = $amenities;
     $data->size	           = $request->size;
     $data->total_bad	   = $request->total_bad;
     $data->total_guest	   = $request->total_guest;
     $data->total_bathroom  = $request->total_bathroom;
     $data->total_balconics = $request->total_balconics;
     $data->video_id	       = $request->video_id;
     $data->status	       = $request->status;
     $data->featured_photo  = $final_name;
     $data->save();

     return redirect()->route('room.view')->with('success','Data Added Successfully');
    }


    public function room_edit($id){

     $amenity_val= Amenity::where('status',0)->get();
     $room_val= Room::where('id',$id)->first();

     $allamenity_val = array();
      if($room_val->amenities != ''){
       $allamenity_val = explode(',',$room_val->amenities);
      }
     return view('back_end.hotal_room.room_edit',compact('amenity_val','room_val','allamenity_val'));
    }

    public function  room_update(Request $request ,$id){

     $request->validate([
      'name'              => 'required',
      'description'       => 'required',
      'price'             => 'required',
      'total_room'        => 'required',
      'total_bad'         => 'required',
      'total_bathroom'    => 'required',
      'total_guest'       => 'required'
     ]);

					$data = Room::where('id',$id)->first();

     $amenities ='';
     $i = 0;

     if(isset($request->amenities)){
      foreach($request->amenities as $item){
       if($i==0){
        $amenities .= $item;
       }
       else{
        $amenities .= ','.$item;
       }
        $i++;
       }
      }

     if($request->hasFile('featured_photo')){
      unlink(public_path('upload/room/'.$data->image));
      $ext        = $request->file('featured_photo')->extension();
      $final_name = time().'.'.$ext;
      $request->file('featured_photo')->move(public_path('upload/room/'),$final_name);
      $data->featured_photo = $final_name;
     }

     $data->name            = $request->name;
     $data->description     = $request->description;
     $data->price	       = $request->price;
     $data->total_room      = $request->total_room;
     $data->amenities       = $amenities;
     $data->size	           = $request->size;
     $data->total_bad	   = $request->total_bad;
     $data->total_guest	   = $request->total_guest;
     $data->total_bathroom  = $request->total_bathroom;
     $data->total_balconics = $request->total_balconics;
     $data->video_id	       = $request->video_id;
     $data->status	       = $request->status;

     $data->update();

     return redirect()->route('room.view')->with('success','Data Update Successfully');
    }

    public function room_active($id){
     Room::find($id)->where('id',$id)->update(['status'=>0]);
     return redirect()->back();
    }

    public function room_inactive($id){
     Room::find($id)->where('id',$id)->update(['status'=>1]);
     return redirect()->back();
    }

    public function room_delete($id){

     $data = Room::where('id',$id)->first();
     unlink(public_path('upload/room/'.$data->featured_photo));
     $data->delete();

     $room_photo = Room_Photo::where('room_id',$id)->get();

     foreach($room_photo as $item)
      {
       unlink(public_path('upload/room_gallery/'.$item->photo));
       $item->delete();
      }

      return redirect()->back()->with('success','Slider Is Delated Successfully');
     }


     public function room_Gallery_add($id){
      $room_gallery = Room_Photo::where('room_id',$id)->get();
      $room_val = Room::where('id',$id)->first();
      return view('back_end.hotal_room.gallary_add',compact('room_val','room_gallery'));
     }

     public function room_Gallery_store(Request $request,$id){

      $request->validate([
       'status'   => 'required',
       'photo'    => 'required|image|mimes:jpg,jpeg,png,git'
      ]);

      $ext        = $request->file('photo')->extension();
      $final_name = time().'.'.$ext;
      $request->file('photo')->move(public_path('upload/room_gallery/'),$final_name);

      $data =new Room_Photo();
      $data->room_id  = $id;
      $data->status   = $request->status;
      $data->photo    = $final_name;
      $data->save();

      return redirect()->back()->with('success','Data Added Successfully');
     }


     public function room_Gallery_active($id){
      Room_Photo::find($id)->where('id',$id)->update(['status'=>0]);
      return redirect()->back();
     }


    public function room_Gallery_inactive($id){
     Room_Photo::find($id)->where('id',$id)->update(['status'=>1]);
     return redirect()->back();
    }


    public function room_Gallery_delete($id){
     $data = Room_Photo::where('id',$id)->first();
     unlink(public_path('upload/room_gallery/'.$data->photo));
     $data->delete();
     return redirect()->back()->with('Success','Slider Is Delated Successfully');
    }




}
