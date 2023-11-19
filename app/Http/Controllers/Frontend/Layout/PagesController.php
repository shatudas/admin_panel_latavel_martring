<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
class PagesController extends Controller
{
    public function about(){
        $about = About::where('status','0')->first();
        if($about){
            return view('Front_end.page.about',compact('about'));
        }
        else{
            return redirect()->back();
        }

    }
}
