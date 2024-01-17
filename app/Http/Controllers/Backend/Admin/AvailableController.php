<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use Auth;

class AvailableController extends Controller
{




    public function available_room(){
        return view('back_end.available_room.available_room');
    }


    public function available_room_search(Request $request){

        $request->validate([
            'selected_date' => 'required'
           ]);

        $selected_date = $request->selected_date;

        return view('back_end.available_room.available_room_view',compact('selected_date'));
    }







}
