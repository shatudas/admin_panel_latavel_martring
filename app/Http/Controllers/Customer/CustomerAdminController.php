<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAdminController extends Controller
{

    public function customer_home(){
        return view('customer.layouts.home');
      }

}
