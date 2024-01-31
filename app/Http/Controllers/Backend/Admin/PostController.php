<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    public function post_view(){
     $data['alldata'] = Post::get();
     return view('back_end.blog_post.view_post',$data);
    }


    public function post_add(){
     return view('back_end.blog_post.add_post');
    }


    public function post_store(Request $request){

     $request->validate([
      'heading'       => 'required',
      'short_content' => 'required',
      'content'       => 'required',
      'status'        => 'required',
      'image'         => 'required|image|mimes:jpg,jpeg,png,git'
     ]);

     $ext        = $request->file('image')->extension();
     $final_name = time().'.'.$ext;
     $request->file('image')->move(public_path('upload/blog_post/'),$final_name);

     $data =new Post();

     $data->heading       = $request->heading;
     $data->short_content = $request->short_content;
     $data->content       = $request->content;
     $data->status	      = $request->status;
     $data->image         = $final_name;
     $data->view          = 0;
     $data->save();

     return redirect()->route('post.view')->with('success','Data Added Successfully');
  }


   public function post_edit($id){
     $data['alldata']= Post::where('id',$id)->first();
     return view('back_end.blog_post.edit_post',$data);
   }


  public function post_update(Request $request ,$id){

    $data = Post::where('id',$id)->first();

    $request->validate([
     'heading'       => 'required',
     'short_content' => 'required',
     'content'       => 'required',
     'status'        => 'required'
    ]);

    if($request->hasFile('image')){

      $request->validate([
       'image' => 'image|mimes:jpg,jpeg,png,git'
      ]);

      unlink(public_path('upload/blog_post/'.$data->image));
       $ext        = $request->file('image')->extension();
       $final_name = time().'.'.$ext;
       $request->file('image')->move(public_path('upload/blog_post/'),$final_name);
       $data->image = $final_name;

       }

       $data->heading       = $request->heading;
       $data->short_content = $request->short_content;
       $data->content       = $request->content;
       $data->status	    = $request->status;


       $data->update();

       return redirect()->route('post.view')->with('success','Data Update Successfully');

   }


    public function post_active($id){
     Post::find($id)->where('id',$id)->update(['status'=>0]);
     return redirect()->back();
    }

    public function post_inactive($id){
     Post::find($id)->where('id',$id)->update(['status'=>1]);
       return redirect()->back();
    }


     public function post_delete($id){

        $data = Post::where('id',$id)->first();
        unlink(public_path('upload/blog_post/'.$data->image));
        $data->delete();
        return redirect()->back()->with('Success','Slider Is Delated Successfully');

     }


}
