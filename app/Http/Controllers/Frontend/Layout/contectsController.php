<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contectsController extends Controller
{



public function contact_send_email(Request $request){


$validator =Validator ::make($request->all(),[
    'name'    =>'required',
    'email'   => 'required|email',
    'massage' => 'required'
]);


  if(!$validator->passes())
    {
    return response()->json(['code'=>0, 'error_message'=>$validator->errors()->toArray()]);
    }
    else
    {
    return response()->json(['code'=>1,'success_massage'=>'Email is Send Successfully']);
    }


}


}
