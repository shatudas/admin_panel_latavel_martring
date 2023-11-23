<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function contact_add(){
        $data['alldata']= Contact::where('id',1)->first();
        return view('back_end.page.contact',$data);
    }


    public function contact_update(Request $request ,$id){

        $request->validate([
        'heading' => 'required',
        'map'     => 'required',
        'status'  => 'required'
        ]);

         $data = Contact::where('id',$id)->first();
         $data->heading  = $request->heading;
         $data->map      = $request->map;
         $data->status	 = $request->status;
         $data->update();

         return redirect()->route('contact.add')->with('success','Data Update Successfully');
       }

}
