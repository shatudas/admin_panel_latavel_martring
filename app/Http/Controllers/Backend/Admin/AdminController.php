<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;

class AdminController extends Controller
{

  public function admin_home(){
    return view('back_end.layouts.home');
  }




}
