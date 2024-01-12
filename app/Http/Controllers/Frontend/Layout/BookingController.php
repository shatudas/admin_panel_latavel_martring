<?php

namespace App\Http\Controllers\Frontend\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Room;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Mail\Websitemail;
use Auth;
use DB;
use Mail;


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
        $arr_cart_room_id       = session()->get('cart_room_id');
        $arr_cart_checkin_data  = session()->get('cart_checkin_data');
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


    public function paypal($final_price){

        $client = 'AQSweyOPbTynemvLhV-8rGdq7lJlkDfmb9p0i9W9x8ahQnPqIGkSrIMaxOegl0d3HBg3F_iNQgl2Kjp0';
        $secret = 'EOE1767W-YtL5s0MWepFKQtMCfHJjDiCUyH0UwwSRa5uwmAUeqXsCPtuSO7jYhBK1e4BDkh02IsA9oia';


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
            $order_no = md5(time());

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders' ");
            $auto_id = $statement[0]->Auto_increment;

            $obj = new Order();
            $obj->customer_id    = Auth::guard('customer')->user()->id;
            $obj->order_no       = $order_no;
            $obj->transaction_id = $result->id;
            $obj->payment_method = 'PayPal';
            $obj->paid_amount    = $paid_amount;
            $obj->booking_date   = date('d/m/Y');
            $obj->status         = 'Complated';
            $obj->save();

            $arr_cart_room_id       = session()->get('cart_room_id', []);
            $arr_cart_checkin_data  = session()->get('cart_checkin_data', []);
            $arr_cart_checkout_data = session()->get('cart_checkout_data', []);
            $arr_cart_adults        = session()->get('cart_adults', []);
            $arr_cart_children      = session()->get('cart_children', []);


            for($i=0; $i<count($arr_cart_room_id); $i++){

                $r_info = Room::where('id',$arr_cart_room_id[$i])->first();

                $d1 = explode('/', $arr_cart_checkin_data[$i]);
                $d2 = explode('/', $arr_cart_checkout_data[$i]);

                $d1_new = $d1[2] . '-' . $d1[1] . '-' . $d1[0];
                $d1_new_replace = str_replace(' ', '', $d1_new);

                $d2_new = $d2[2] . '-' . $d2[1] . '-' . $d2[0];
                $d2_new_replace = str_replace(' ', '', $d2_new);

                $t1 = strtotime($d1_new_replace);
                $t2 = strtotime($d2_new_replace);
                $diff = ($t2 - $t1) / 60 / 60 / 24;
                $sub  = $r_info->price * $diff;

                $object = new OrderDetail();
                $object->order_id      = $auto_id;
                $object->room_id       = $arr_cart_room_id[$i];
                $object->order_no      = $order_no;
                $object->checking_date = $arr_cart_checkin_data[$i];
                $object->checkout_date = $arr_cart_checkout_data[$i];
                $object->adult         = $arr_cart_adults[$i];
                $object->children      = $arr_cart_children[$i];
                $object->subtotal      = $sub;
                $object->save();

                $subject ='New Orders';
                $message ='Yor have an order for hotel booking. The booking information is giver below: <br>';
                $message .='<br> Order ID:'.$order_no;
                $message .='<br> Transaction Id:'.$result->id;
                $message .='<br> Payment Method : PayPal';
                $message .='<br> Paid Amount:'. $paid_amount;
                $message .='<br> Status: Complated:'.'<br>';


                for($i=0; $i<count($arr_cart_room_id); $i++){

                    $r_info = Room::where('id',$arr_cart_room_id[$i])->first();

                    $message .='<br> Room Name:'.$r_info->name;
                    $message .='<br> Price Par Night: $'.$r_info->price;
                    $message .='<br> Cart Checkin Date:'.$arr_cart_checkin_data[$i];
                    $message .='<br> Cart CheckOut Date:'.$arr_cart_checkout_data[$i];
                    $message .='<br> Adults:'.$arr_cart_adults[$i];
                    $message .='<br> Chilldren:'.$arr_cart_children[$i].'<br>';
                }

                $customer_email = Auth::guard('customer')->user()->email;

                Mail::to($customer_email)->send(new Websitemail($subject, $message));

                session()->forget('cart_room_id');
                session()->forget('cart_checkin_data');
                session()->forget('cart_checkout_data');
                session()->forget('cart_adults');
                session()->forget('cart_children');
                session()->forget('billing_name');
                session()->forget('billing_email');
                session()->forget('billing_phone');
                session()->forget('billing_country');
                session()->forget('billing_address');
                session()->forget('billing_state');
                session()->forget('billing_city');
                session()->forget('billing_zip');

            }

            return redirect()->route('customer.home')->with('success', 'Payment Is Successfull');
        }
        else{
            return redirect()->back()->with('error', 'Payment Is Failed');
        }


    }


















}
