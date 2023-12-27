<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function cart_submit(Request $request){

     $request->validate([
     'room_id'          => 'required',
     'checkin_checkout' => 'required',
     'adults'           => 'required'
     ]);

     $data = explode('-',$request->checkin_checkout);
     $checkin_data=$data[0];
     $checkout_data=$data[1];

    //    return Carbon::createFromFormat('Y-m-d',$checkin_data);
    //    return Carbon::createFromFormat('Y-m-d',$checkin_data);
    //    return $datapass1 = Carbon::parse(date('Y-m-d',strtotime($checkin_data)));
    //    $datapass2 = Carbon::parse($checkout_data);
    //    return $datapass1->diffInDays($datapass2);


     session()->push('cart_room_id',$request->room_id);
     session()->push('cart_checkin_data',$checkin_data);
     session()->push('cart_checkout_data',$checkout_data);
     session()->push('cart_adults',$request->adults);
     session()->push('cart_children',$request->children);


     return redirect()->back()->with('success','Room Is Added The Cart Successfully');

    }

    public function cart_page(){
     return view('front_end.page.cart');
    }



}
