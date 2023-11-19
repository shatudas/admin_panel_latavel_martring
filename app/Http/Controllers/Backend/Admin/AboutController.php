<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{

    public function about_add(){
        $data['alldata']= About::where('id',1)->first();
        return view('back_end.page.about',$data);
    }


    public function about_update(Request $request ,$id){

        $request->validate([
        'heading' => 'required',
        'detalis' => 'required',
        'status'  => 'required'
        ]);

         $data = About::where('id',$id)->first();
         $data->heading  = $request->heading;
         $data->detalis  = $request->detalis;
         $data->status	 = $request->status;
         $data->update();

         return redirect()->route('about.add')->with('success','Data Update Successfully');
       }



}
