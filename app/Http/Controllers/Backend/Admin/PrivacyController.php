<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;


class PrivacyController extends Controller
{
    public function privacy_add(){
        $data['alldata']= Privacy::where('id',1)->first();
        return view('back_end.page.privacy',$data);
      }

      public function privacy_update(Request $request ,$id){

        $request->validate([
        'heading' => 'required',
        'detalis' => 'required',
        'status'  => 'required'
        ]);

        $data = privacy::where('id',$id)->first();
        $data->heading  = $request->heading;
        $data->detalis  = $request->detalis;
        $data->status	 = $request->status;
        $data->update();

        return redirect()->route('privacy.add')->with('success','Data Update Successfully');

      }
}
