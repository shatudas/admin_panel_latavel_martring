<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;


class AmenityController extends Controller
{


    public function amenity_view(){
        $data['alldata'] = Amenity::get();
        return view('back_end.amenity.amenity_view',$data);
    }

    public function amenity_add(){
        return view('back_end.amenity.amenity_add');
    }

    public function amenity_store(Request $request){

        $request->validate([
         'name'   => 'required',
         'status'  => 'required'
        ]);

        $data =new Amenity();
        $data->name      = $request->name;
        $data->status	 = $request->status;
        $data->save();

        return redirect()->route('amenity.view')->with('success','Data Added Successfully');

    }

        public function amenity_edit($id){
            $data['alldata']= Amenity::where('id',$id)->first();
            return view('back_end.amenity.amenity_edit',$data);
        }

        public function amenity_update(Request $request ,$id){

            $request->validate([
            'name' => 'required',
            'status'   => 'required'
            ]);

             $data = Amenity::where('id',$id)->first();
             $data->name    = $request->name;
             $data->status	= $request->status;
             $data->update();

             return redirect()->route('amenity.view')->with('success','Data Update Successfully');
           }

           public function amenity_active($id){
            Amenity::find($id)->where('id',$id)->update(['status'=>0]);
            return redirect()->back();
           }

            public function amenity_inactive($id){
            Amenity::find($id)->where('id',$id)->update(['status'=>1]);
             return redirect()->back();
            }

            public function amenity_delete($id){

             $data = Amenity::where('id',$id)->first();
             $data->delete();
             return redirect()->back()->with('Success','Data Is Delated Successfully');

         }



}
