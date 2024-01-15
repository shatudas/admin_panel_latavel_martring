<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Auth;


class CustomerAdminController extends Controller
{

  
    public function customer_home(){
        $complated = Order::where('status','Complated')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        $padding= Order::where('status','Padding')->where('customer_id',Auth::guard('customer')->user()->id)->count();
        return view('customer.layouts.home',compact('complated','padding'));
      }


}
