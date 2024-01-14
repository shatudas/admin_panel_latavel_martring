<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class CustomerAdminController extends Controller
{

    public function customer_home(){
        $complated = Order::where('status','Complated')->count();
        $padding= Order::where('status','Padding')->count();
        return view('customer.layouts.home',compact('complated','padding'));
      }

}
