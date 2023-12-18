<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Amenity;

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
         'name'              => 'required',
         'description'       => 'required',
         'price'             => 'required',
         'total_room'        => 'required',
         'total_bad'         => 'required',
         'total_bathroom'    => 'required',
         'total_guest'       => 'required',
         'featured_photo'    => 'required|image|mimes:jpg,jpeg,png,git'
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





}
