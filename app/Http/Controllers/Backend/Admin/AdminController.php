<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Room;
use App\Models\Subscriber;
use Hash;
use Auth;

class AdminController extends Controller
{

  public function admin_home(){
    $alldate ['complated_order']   = Order::where('status','Complated')->count();
    $alldate ['padding_order']     = Order::where('status','Padding')->count();
    $alldate ['active_customer']   = Customer::where('status','0')->count();
    $alldate ['padding_customer']  = Customer::where('status','1')->count();
    $alldate ['total_room']        = Room::where('status','1')->count();
    $alldate ['subscriber']        = Subscriber::count();
    $alldate ['order']   = Order::orderBy('id','desc')->skip(0)->take(5)->get();

    return view('back_end.layouts.home',$alldate);
  }




}
