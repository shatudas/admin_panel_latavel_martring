<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\faq;

class FAQsController extends Controller
{
    public function faq(){
        $data['faq'] = FAQ::where('status','0')->get();
        return view('Front_end.FAQ.faq',$data);
    }
}
