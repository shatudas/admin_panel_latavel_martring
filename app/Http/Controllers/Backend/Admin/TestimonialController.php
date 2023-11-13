<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{


    public function testimonial_view(){
        $data['alldata'] = Testimonial::get();
        return view('back_end.testimonial.view_Testimonial',$data);
    }


    public function testimonial_add(){
        return view('back_end.testimonial.add_testimonial');
    }


    public function testimonial_store(Request $request){

        $request->validate([
         'name'        => 'required',
         'designation' => 'required',
         'massage'     => 'required',
         'status'      => 'required',
         'image'       => 'required|image|mimes:jpg,jpeg,png,git'
        ]);


        $ext        = $request->file('image')->extension();
        $final_name = time().'.'.$ext;
        $request->file('image')->move(public_path('upload/Testimonial/'),$final_name);

        $data =new Testimonial();
        $data->image        = $final_name;
        $data->name         = $request->name;
        $data->designation  = $request->designation;
        $data->massage      = $request->massage;
        $data->status       = $request->status;

        $data->save();

        return redirect()->route('testimonial.view')->with('success','Data Added Successfully');
    }


    public function testimonial_edit($id){
        $data['alldata']= Testimonial::where('id',$id)->first();
        return view('back_end.testimonial.edit_testimonial',$data);
    }


    public function testimonial_update(Request $request ,$id){

        $data = Testimonial::where('id',$id)->first();

        if($request->hasFile('image')){

            $request->validate([
            'name'        => 'required',
            'designation' => 'required',
            'massage'     => 'required',
            'status'      => 'required',
            'image'       => 'required|image|mimes:jpg,jpeg,png,git'
            ]);

            unlink(public_path('upload/Testimonial/'.$data->image));
            $ext        = $request->file('image')->extension();
            $final_name = time().'.'.$ext;
            $request->file('image')->move(public_path('upload/Testimonial/'),$final_name);
            $data->image = $final_name;
           }

           $data->image        = $final_name;
           $data->name         = $request->name;
           $data->designation  = $request->designation;
           $data->massage      = $request->massage;
           $data->status       = $request->status;

            $data->update();

            return redirect()->route('testimonial.view')->with('success','Data Added Successfully');

        }


        public function testimonial_active($id){
            Testimonial::find($id)->where('id',$id)->update(['status'=>0]);
            return redirect()->back();
        }

        public function testimonial_inactive($id){
            Testimonial::find($id)->where('id',$id)->update(['status'=>1]);
            return redirect()->back();
        }



        public function testimonial_delete($id){

            $data = Testimonial::where('id',$id)->first();
            unlink(public_path('upload/Testimonial/'.$data->image));
            $data->delete();
            return redirect()->back()->with('Success','Data Is Delated Successfully');

        }






}
