<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function post(){
        $data['post'] = Post::where('status','0')->orderBy('id','DESC')->paginate(6);
        return view('front_end.post.post',$data);
    }


    public function postView($id){
        $post_view = Post::where('id',$id)->first();
        $post_view->view = $post_view->view + 1;
        $post_view->update();
        return view('front_end.post.post_view',compact('post_view'));
    }

}
