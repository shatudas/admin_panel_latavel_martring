<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;

class TermsController extends Controller
{

    public function terms_add(){
      $data['alldata']= Term::where('id',1)->first();
      return view('back_end.page.term',$data);
    }

    public function terms_update(Request $request ,$id){

      $request->validate([
      'heading' => 'required',
      'detalis' => 'required',
      'status'  => 'required'
      ]);

      $data = Term::where('id',$id)->first();
      $data->heading  = $request->heading;
      $data->detalis  = $request->detalis;
      $data->status	 = $request->status;
      $data->update();

      return redirect()->route('terms.add')->with('success','Data Update Successfully');

	}
}
