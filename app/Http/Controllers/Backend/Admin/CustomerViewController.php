<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerViewController extends Controller
{


    public function customer_view(){
        $customer = Customer::get();
        return view('back_end.customer.customer_view',compact('customer'));
    }


    public function customer_status($id){

        $customer_data = Customer::where('id',$id)->first();
        if($customer_data->status == '0'){
            $customer_data->status = '1';
        }else{
            $customer_data->status = '0';
        }
        $customer_data->update();

        return redirect()->back()->with('success','Data Updated Successfully');

    }



}
