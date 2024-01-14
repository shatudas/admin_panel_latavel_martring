<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;


class CustomerOrderController extends Controller
{

   public function customer_order(){
    $alldata = Order::where('customer_id', Auth::guard('customer')->user()->id)->get();
    return view ('customer.order.order_view',compact('alldata'));
   }


   public function customer_invoice($id){
    $order = Order::where('id',$id)->first();
    $order_detrail = OrderDetail::where('order_id',$id)->get();
    return view ('customer.order.invoice',compact('order','order_detrail'));
   }

}
