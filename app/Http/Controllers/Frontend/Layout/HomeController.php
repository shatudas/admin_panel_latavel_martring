<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Room;


class HomeController extends Controller
{

    public function index(){
        $data['slider'] = Slider::where('status','0')->get();
        $data['feature'] = Feature::where('status','0')->get();
        $data['testimonial'] = Testimonial::where('status','0')->get();
        $data['post'] = Post::where('status','0')->orderBy('id','DESC')->limit(3)->get();
        $data['room'] = Room::where('status','0')->limit(4)->get();
        $data['roomcart'] = Room::where('status','0')->get();
        return view('front_end.layout.home',$data);
    }

}
