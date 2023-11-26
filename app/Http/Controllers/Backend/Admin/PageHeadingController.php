<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pageheadding;

class PageHeadingController extends Controller
{
   

						public function photoheading_add(){
								$data['alldata']= Pageheadding::where('id',1)->first();
								return view('back_end.pageSetup.photo_page',$data);
						}


      public function photoheading_update(Request $request ,$id){
       $request->validate([
        'photoheading' => 'required',
        'photostatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->photoheading  = $request->photoheading;
         $data->photostatus	  = $request->photostatus;
         $data->update();

         return redirect()->route('photoheading.add')->with('success','Data Update Successfully');
       }


						public function videoheading_add(){
								$data['alldata']= Pageheadding::where('id',1)->first();
								return view('back_end.pageSetup.video_page',$data);
      }

				
      public function videoheading_update(Request $request ,$id){

        $request->validate([
        'videoheading' => 'required',
        'videostatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->videoheading  = $request->videoheading;
         $data->videostatus	  = $request->videostatus;
         $data->update();

         return redirect()->route('videoheading.add')->with('success','Data Update Successfully');
       }


					public function faqheading_add(){
							$data['alldata']= Pageheadding::where('id',1)->first();
							return view('back_end.pageSetup.faq_page',$data);
					}


      public function faqheading_update(Request $request ,$id){

        $request->validate([
        'faqheading' => 'required',
        'faqstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->faqheading    = $request->faqheading;
         $data->faqstatus	  = $request->faqstatus;
         $data->update();

         return redirect()->route('faqheading.add')->with('success','Data Update Successfully');
       }


						public function blogheading_add(){
								$data['alldata']= Pageheadding::where('id',1)->first();
								return view('back_end.pageSetup.blog_page',$data);
						}


      public function blogheading_update(Request $request ,$id){
      

        $request->validate([
        'blogheading' => 'required',
        'blogstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->blogheading    = $request->blogheading;
         $data->blogstatus	   = $request->blogstatus;

         $data->update();

         return redirect()->route('blogheading.add')->with('success','Data Update Successfully');
       }

}
