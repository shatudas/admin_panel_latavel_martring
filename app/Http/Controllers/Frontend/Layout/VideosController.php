<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;


class VideosController extends Controller
{


    public function video(){
        $data['video'] = Video::where('status','0')->paginate(12);
        return view('Front_end.video.video',$data);
    }

}
