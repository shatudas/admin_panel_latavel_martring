<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{

    public function slide_view(){
        $data['alldata'] = Slider::get();
        return view('back_end.slider.view_silder',$data);
    }


}
