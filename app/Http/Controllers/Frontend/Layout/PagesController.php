<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Term;
use App\Models\Privacy;
use App\Models\Contact;


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



    public function term(){
        $term = Term::where('status','0')->first();
        if($term){
            return view('Front_end.page.term',compact('term'));
        }
        else{
            return redirect()->back();
        }

    }


    public function privacy(){
        $privacy = Privacy::where('status','0')->first();
        if($privacy){
            return view('Front_end.page.privacy',compact('privacy'));
        }
        else{
            return redirect()->back();
        }

    }



    public function contect(){
        $contect = Contact::where('status','0')->first();
        if($contect){
            return view('Front_end.page.contact',compact('contect'));
        }
        else{
            return redirect()->back();
        }

    }









}
