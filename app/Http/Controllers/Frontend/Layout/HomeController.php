<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;


class HomeController extends Controller
{

    public function index(){
        $data['slider'] = Slider::where('status','0')->get();
        return view('front_end.layout.home',$data);
    }

}
