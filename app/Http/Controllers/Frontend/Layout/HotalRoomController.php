<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;

class HotalRoomController extends Controller
{

    public function single_room($id){
        $room_detali = Room::with('roomGallery')->where('id',$id)->first();
        return view('Front_end.room.single_room',compact('room_detali'));
    }
}
