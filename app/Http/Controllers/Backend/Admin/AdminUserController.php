<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\AdminRole;
use Auth;


class AdminUserController extends Controller
{

    public function admin_view(){

        if(Auth::guard('admin')->user()->role != 'Administrator'){
            abort(403);
        }

        $data['alldata'] = Admin::get();
        return view('back_end.admin.view_admin',$data);


    }

    public function admin_add(){

        if(Auth::guard('admin')->user()->role != 'Administrator'){
            abort(403);
        }

        $data['role'] = AdminRole::get();
        return view('back_end.admin.add_admin',$data);
    }

    public function admin_store(Request $request){

        $request->validate([
         'role'             => 'required',
         'name'             => 'required',
         'email'            => 'required',
         'status'           => 'required',
         'password'         => 'required',
         'retype_password'  => 'required'
        ]);

        $data =new Admin();

        $data->role         = $request->role;
        $data->name         = $request->name;
        $data->email	    = $request->email;
        $data->status       = $request->status;
        $data->password     = bcrypt($request->password);

        $data->save();

        return redirect()->route('admin.view')->with('success','Data Added Successfully');
    }


    public function admin_active($id){
        Admin::find($id)->where('id',$id)->update(['status'=>0]);
        return redirect()->back();
    }



    public function admin_inactive($id){
        Admin::find($id)->where('id',$id)->update(['status'=>1]);
        return redirect()->back();
    }


    public function admin_delete($id){

        if(Auth::guard('admin')->user()->role != 'Administrator'){
            abort(403);
        }

        $data = Admin::where('id',$id)->first();

        if(file_exists('public/upload/admin' .$data->photo) AND !empty($data->photo))
            {
                unlink('public/upload/admin' .$data->photo);
            }

        $data->delete();
        return redirect()->back()->with('Success','Data Is Delated Successfully');

    }


    public function admin_edit($id){

        if(Auth::guard('admin')->user()->role != 'Administrator'){
            abort(403);
        }

        $data['role'] = AdminRole::get();
        $data['alldata']= Admin::where('id',$id)->first();
        return view('back_end.admin.edit_admin',$data);
    }


    public function admin_update(Request $request,$id){

        $request->validate([
         'role'             => 'required',
         'name'             => 'required',
         'email'            => 'required',
         'status'           => 'required'
        ]);

        $data = Admin::where('id',$id)->first();

        $data->role         = $request->role;
        $data->name         = $request->name;
        $data->email	    = $request->email;
        $data->status       = $request->status;
        $data->password     = bcrypt($request->password);

        $data->save();

        return redirect()->route('admin.view')->with('success','Data Added Successfully');
    }




}
