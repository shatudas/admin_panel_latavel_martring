<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotosController extends Controller
{
    public function photo(){
        $data['photo'] = Photo::where('status','0')->paginate(12);
        return view('Front_end.photo.photo',$data);
    }
}
