<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
class CustomerViewController extends Controller
{


    public function customer_view(){
        $customer = Customer::get();
        return view('back_end.customer.customer_view',compact('customer'));
    }


    public function customer_status($id){

        $customer_data = Customer::where('id',$id)->first();
        if($customer_data->status == '0'){
            $customer_data->status = '1';
        }else{
            $customer_data->status = '0';
        }
        $customer_data->update();

        return redirect()->back()->with('success','Data Updated Successfully');

    }


    public function admin_order(){
        $alldata = Order::orderBy('booking_date')->get();
        return view ('back_end.order.order_view',compact('alldata'));
       }


    public function admin_invoice($id){
        $order = Order::where('id',$id)->first();
        $order_detrail = OrderDetail::where('order_id',$id)->get();
        $customer_info = Customer::where('id',$order->customer_id)->first();
        return view ('back_end.order.invoice',compact('order','order_detrail','customer_info'));
       }



}
