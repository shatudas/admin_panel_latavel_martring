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




    public function cart_delete($id) {
        $arr_cart_room_id       = session()->get('cart_room_id', []);
        $arr_cart_checkin_data  = session()->get('cart_checkin_data', []);
        $arr_cart_checkout_data = session()->get('cart_checkout_data', []);
        $arr_cart_adults        = session()->get('cart_adults', []);
        $arr_cart_children      = session()->get('cart_children', []);

        $index = array_search($id, $arr_cart_room_id);

        if ($index !== false) {
            unset($arr_cart_room_id[$index]);
            unset($arr_cart_checkin_data[$index]);
            unset($arr_cart_checkout_data[$index]);
            unset($arr_cart_adults[$index]);
            unset($arr_cart_children[$index]);

            $arr_cart_room_id       = array_values($arr_cart_room_id);
            $arr_cart_checkin_data  = array_values($arr_cart_checkin_data);
            $arr_cart_checkout_data = array_values($arr_cart_checkout_data);
            $arr_cart_adults        = array_values($arr_cart_adults);
            $arr_cart_children      = array_values($arr_cart_children);
        }

        session([
            'cart_room_id'       => $arr_cart_room_id,
            'cart_checkin_data'  => $arr_cart_checkin_data,
            'cart_checkout_data' => $arr_cart_checkout_data,
            'cart_adults'        => $arr_cart_adults,
            'cart_children'      => $arr_cart_children,
        ]);

        return redirect()->back()->with('success', 'Cart deleted successfully');
    }


    public function checkout_page(){
        return view('front_end.page.checkout');
    }










}
