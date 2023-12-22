<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pageheadding;

class PageHeadingController extends Controller
{


    public function roomheading_add(){
	    $data['alldata']= Pageheadding::where('id',1)->first();
		return view('back_end.pageSetup.room_page',$data);
    }


    public function roomheading_update(Request $request ,$id){
        $request->validate([
         'roomheading' => 'required',
         'roomstatus'  => 'required'
         ]);
 
          $data = Pageheadding::where('id',$id)->first();
          $data->roomheading  = $request->roomheading;
          $data->roomstatus   = $request->roomstatus;
          $data->update();
 
          return redirect()->route('roomheading.add')->with('success','Data Update Successfully');
        }


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


       public function cartheading_add(){
        $data['alldata']= Pageheadding::where('id',1)->first();
        return view('back_end.pageSetup.cart_page',$data);
        }


       public function cartheading_update(Request $request ,$id){

        $request->validate([
        'cartheading' => 'required',
        'cartstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->cartheading    = $request->cartheading;
         $data->cartstatus	   = $request->cartstatus;

         $data->update();

         return redirect()->route('cartheading.add')->with('success','Data Update Successfully');
       }


       public function cheakheading_add(){
         $data['alldata']= Pageheadding::where('id',1)->first();
         return view('back_end.pageSetup.cheakout_page',$data);
        }

      public function cheakheading_update(Request $request ,$id){

        $request->validate([
        'checkoutheading' => 'required',
        'checkoutstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->checkoutheading    = $request->checkoutheading;
         $data->checkoutstatus	   = $request->checkoutstatus;

         $data->update();

         return redirect()->route('cheakheading.add')->with('success','Data Update Successfully');
       }


		public function singup_heading_add(){
			$data['alldata']= Pageheadding::where('id',1)->first();
		    return view('back_end.pageSetup.singup_page',$data);
		}


      public function singup_heading_update(Request $request ,$id){

        $request->validate([
        'singupheading' => 'required',
        'singupstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->singupheading    = $request->singupheading;
         $data->singupstatus	 = $request->singupstatus;

         $data->update();

         return redirect()->route('singup_heading.add')->with('success','Data Update Successfully');
       }




						public function singin_heading_add(){
								$data['alldata']= Pageheadding::where('id',1)->first();
								return view('back_end.pageSetup.singin_page',$data);
						}


      public function singin_heading_update(Request $request ,$id){

        $request->validate([
        'singheading' => 'required',
        'singstatus'  => 'required'
        ]);

         $data = Pageheadding::where('id',$id)->first();
         $data->singheading    = $request->singheading;
         $data->singstatus	   = $request->singstatus;

         $data->update();

         return redirect()->route('singin_heading.add')->with('success','Data Update Successfully');
       }



}
