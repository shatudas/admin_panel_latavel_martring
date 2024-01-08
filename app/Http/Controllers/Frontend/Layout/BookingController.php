<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class BookingController extends Controller
{
    public function cart_submit(Request $request){

     $request->validate([
     'room_id'          => 'required',
     'checkin_checkout' => 'required',
     'adults'           => 'required'
     ]);

     $data = explode('-',$request->checkin_checkout);
     $checkin_data=$data[0];
     $checkout_data=$data[1];

     session()->push('cart_room_id',$request->room_id);
     session()->push('cart_checkin_data',$checkin_data);
     session()->push('cart_checkout_data',$checkout_data);
     session()->push('cart_adults',$request->adults);
     session()->push('cart_children',$request->children);


     return redirect()->back()->with('success','Room Is Added The Cart Successfully');

    }

    public function cart_page(){
     return view('front_end.page.cart');
    }

    public function cart_delete($id) {
        $arr_cart_room_id       = session()->get('cart_room_id', []);
        $arr_cart_checkin_data  = session()->get('cart_checkin_data', []);
        $arr_cart_checkout_data = session()->get('cart_checkout_data', []);
        $arr_cart_adults        = session()->get('cart_adults', []);
        $arr_cart_children      = session()->get('cart_children', []);

        $index = array_search($id, $arr_cart_room_id);

        if ($index !== false) {
            unset($arr_cart_room_id[$index]);
            unset($arr_cart_checkin_data[$index]);
            unset($arr_cart_checkout_data[$index]);
            unset($arr_cart_adults[$index]);
            unset($arr_cart_children[$index]);

            $arr_cart_room_id       = array_values($arr_cart_room_id);
            $arr_cart_checkin_data  = array_values($arr_cart_checkin_data);
            $arr_cart_checkout_data = array_values($arr_cart_checkout_data);
            $arr_cart_adults        = array_values($arr_cart_adults);
            $arr_cart_children      = array_values($arr_cart_children);
        }

        session([
            'cart_room_id'       => $arr_cart_room_id,
            'cart_checkin_data'  => $arr_cart_checkin_data,
            'cart_checkout_data' => $arr_cart_checkout_data,
            'cart_adults'        => $arr_cart_adults,
            'cart_children'      => $arr_cart_children,
        ]);

        return redirect()->back()->with('success', 'Cart deleted successfully');
    }


    public function checkout_page(){
        if(!Auth::guard('customer')->check())
        {
            return redirect()->back()->with('error', 'You most habe to login in order cart');
        }

        if(!session()->has('cart_room_id')){
            return redirect()->back()->with('error', 'There is no item in the cart');
        }


        return view('front_end.page.checkout');
    }


    public function payment_page(Request $request){

        if(!Auth::guard('customer')->check())
        {
            return redirect()->back()->with('error', 'You most habe to login in order cart');
        }

        if(!session()->has('cart_room_id')){
            return redirect()->back()->with('error', 'There is no item in the cart');
        }

        $request->validate([
            'billing_name'     => 'required',
            'billing_email'    => 'required',
            'billing_phone'    => 'required',
            'billing_country'  => 'required',
            'billing_address'  => 'required',
            'billing_state'    => 'required',
            'billing_city'     => 'required',
            'billing_zip'      => 'required',
            ]);

        session()->put('billing_name',$request->billing_name);
        session()->put('billing_email',$request->billing_email);
        session()->put('billing_phone',$request->billing_phone);
        session()->put('billing_country',$request->billing_country);
        session()->put('billing_address',$request->billing_address);
        session()->put('billing_state',$request->billing_state);
        session()->put('billing_city',$request->billing_city);
        session()->put('billing_zip',$request->billing_zip);

        return view('front_end.page.payment');
    }


    public function paypal(){

        $client = 'AQSweyOPbTynemvLhV-8rGdq7lJlkDfmb9p0i9W9x8ahQnPqIGkSrIMaxOegl0d3HBg3F_iNQgl2Kjp0';
        $secret = 'EOE1767W-YtL5s0MWepFKQtMCfHJjDiCUyH0UwwSRa5uwmAUeqXsCPtuSO7jYhBK1e4BDkh02IsA9oia';
        $final_price ='5';

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $client, // ClientID
                $secret // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount  = new Amount();
        $details = new Details();

        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);
        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved')
        {
            $paid_amount = $result->transactions[0]->amount->total;
        }


    }


















}
