<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function admin_home(){
    return view('back_end.layouts.home');
  }


}
