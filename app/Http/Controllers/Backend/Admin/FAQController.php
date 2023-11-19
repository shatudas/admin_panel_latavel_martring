<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;

class FAQController extends Controller
{
    
    public function faq_view(){
        $data['alldata'] = FAQ::get();
        return view('back_end.FAQ.view_faq',$data);
    }


    public function faq_add(){
        return view('back_end.FAQ.add_faq');
    }


    public function faq_store(Request $request){

        $request->validate([
         'question' => 'required',
         'anwser'   => 'required',
         'status'   => 'required'
        ]);

        $data =new FAQ();
        $data->question  = $request->question;
        $data->anwser    = $request->anwser;
        $data->status	 = $request->status;
        $data->save();

        return redirect()->route('faq.view')->with('success','Data Added Successfully');
    }


    public function faq_edit($id){
        $data['alldata']= FAQ::where('id',$id)->first();
        return view('back_end.FAQ.edit_faq',$data);
    }
   
   
   
       public function faq_update(Request $request ,$id){
   
        $request->validate([
        'question' => 'required',
        'anwser'   => 'required',
        'status'   => 'required'
        ]);
   
         $data = FAQ::where('id',$id)->first();
         $data->question  = $request->question;
         $data->anwser    = $request->anwser;
         $data->status	 = $request->status;
         $data->update();
   
         return redirect()->route('faq.view')->with('success','Data Update Successfully');
       }
   
   
       public function faq_active($id){
        FAQ::find($id)->where('id',$id)->update(['status'=>0]);
        return redirect()->back();
       }
   
        public function faq_inactive($id){
         FAQ::find($id)->where('id',$id)->update(['status'=>1]);
         return redirect()->back();
        }
   
   
        public function faq_delete($id){
   
         $data =  FAQ::where('id',$id)->first();
         $data->delete();
         return redirect()->back()->with('Success','Data Is Delated Successfully');
   
     }


}
