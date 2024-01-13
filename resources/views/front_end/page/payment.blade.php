@extends('front_end.layout.index')
@section('frontend_content')

    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row cart">

                <div class="col-lg-4 col-md-6 checkout-left mb_30">

                    <h4>Make Payment</h4>
                    <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                        <option value="">Select Payment Method</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Stripe">Stripe</option>
                    </select>

                    <div class="paypal mt_20">
                        <h4>Pay with PayPal</h4>
                        <div id="paypal-button"></div>
                    </div>

                    <div class="stripe mt_20">
                        <h4>Pay with Stripe</h4>

                        @php
                            $arr_cart_room_id = session()->get('cart_room_id');
                            $arr_cart_checkin_data = session()->get('cart_checkin_data');
                            $arr_cart_checkout_data = session()->get('cart_checkout_data');
                            $arr_cart_adults = session()->get('cart_adults');
                            $arr_cart_children = session()->get('cart_children');
                            $total_price = 0;
                        @endphp

                        @for ($i = 0; $i < count($arr_cart_room_id); $i++)
                            @php
                                $data = DB::table('rooms')
                                    ->where('id', $arr_cart_room_id[$i])
                                    ->first();
                                $d1 = explode('/', $arr_cart_checkin_data[$i]);
                                $d2 = explode('/', $arr_cart_checkout_data[$i]);

                                $d1_new = $d1[2] . '-' . $d1[1] . '-' . $d1[0];
                                $d1_new_replace = str_replace(' ', '', $d1_new);

                                $d2_new = $d2[2] . '-' . $d2[1] . '-' . $d2[0];
                                $d2_new_replace = str_replace(' ', '', $d2_new);

                                $t1 = strtotime($d1_new_replace);
                                $t2 = strtotime($d2_new_replace);
                                $diff = ($t2 - $t1) / 60 / 60 / 24;

                                $total_price = $total_price + $data->price * $diff;

                            @endphp
                        @endfor


                        @php
                            $cents =$total_price * 100;
                            $customer_email = Auth::guard('customer')->user()->email;
                            $stripe_publishable_key ='pk_test_51OXzTnKa2KipEgLJI4obcVvOiS1RNBxiI3RN7rQCAohLbCU5iUbmPzIY90YkR4DQ8FQI1I6UR9WEUQdwB8SJElST00dgG8xkLK';
                        @endphp

                        <form action="{{ route('payment_stripe',$total_price) }}" method="post">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ $stripe_publishable_key }}"
                            data-amount="{{ $cents }}"
                            data-name="{{ env('APP_NAME') }}"
                            data-description=""
                            data-image="{{ asset('upload/stripe_icon.png') }}"
                            data-currency="usd"
                            data-email="{{ $customer_email }}"
                        >
                        </script>
                        </form>

                    </div>

                </div>


                <div class="col-lg-4 col-md-6 checkout-right">
                    <div class="inner">
                        <h4 class="mb_10">Billing Detalis</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name :</td>
                                        <td>{{ session()->get('billing_name') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{ session()->get('billing_email') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ session()->get('billing_phone') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>{{ session()->get('billing_country') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ session()->get('billing_address') }}</td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td>{{ session()->get('billing_state') }}</td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td>{{ session()->get('billing_city') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Zip Code</td>
                                        <td>{{ session()->get('billing_zip') }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 checkout-right">
                    <div class="inner">
                        <h4 class="mb_10">Cart Details</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    @php
                                        $arr_cart_room_id = session()->get('cart_room_id');
                                        $arr_cart_checkin_data = session()->get('cart_checkin_data');
                                        $arr_cart_checkout_data = session()->get('cart_checkout_data');
                                        $arr_cart_adults = session()->get('cart_adults');
                                        $arr_cart_children = session()->get('cart_children');
                                        $total_price = 0;
                                    @endphp

                                    @for ($i = 0; $i < count($arr_cart_room_id); $i++)
                                        @php
                                            $data = DB::table('rooms')
                                                ->where('id', $arr_cart_room_id[$i])
                                                ->first();
                                            $d1 = explode('/', $arr_cart_checkin_data[$i]);
                                            $d2 = explode('/', $arr_cart_checkout_data[$i]);

                                            $d1_new = $d1[2] . '-' . $d1[1] . '-' . $d1[0];
                                            $d1_new_replace = str_replace(' ', '', $d1_new);

                                            $d2_new = $d2[2] . '-' . $d2[1] . '-' . $d2[0];
                                            $d2_new_replace = str_replace(' ', '', $d2_new);

                                            $t1 = strtotime($d1_new_replace);
                                            $t2 = strtotime($d2_new_replace);
                                            $diff = ($t2 - $t1) / 60 / 60 / 24;
                                        @endphp

                                        <tr>
                                            <td>
                                                {{ $data->name }}
                                                <br>
                                                ({{ $arr_cart_checkin_data[$i] }} - {{ $arr_cart_checkout_data[$i] }})
                                                <br>
                                                Adult: {{ $arr_cart_adults[$i] }}, Children: {{ $arr_cart_children[$i] }}
                                            </td>
                                            <td class="p_price">{{ $data->price * $diff }} Tk</td>
                                        </tr>

                                        @php
                                            $total_price = $total_price + $data->price * $diff;
                                        @endphp
                                    @endfor

                                    <tr>
                                        <td><b>Total:</b></td>
                                        <td class="p_price">
                                            <b> {{ $total_price }} TK </b>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    @php
        $client = 'AQSweyOPbTynemvLhV-8rGdq7lJlkDfmb9p0i9W9x8ahQnPqIGkSrIMaxOegl0d3HBg3F_iNQgl2Kjp0';
    @endphp


    <script>
        paypal.Button.render({
            env: 'sandbox',
            client: {
                sandbox: '{{ $client }}',
                production: '{{ $client }}'
            },
            locale: 'en_US',
            style: {
                size: 'medium',
                color: 'blue',
                shape: 'rect',
            },
            // Set up a payment
            payment: function (data, actions) {
                return actions.payment.create({
                    redirect_urls:{
                        return_url: '{{ url("payment/paypal/$total_price") }}'
                    },
                    transactions: [{
                        amount: {
                            total: '{{ $total_price }}',
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function (data, actions) {
                return actions.redirect();
            }
        }, '#paypal-button');
    </script>

@endsection
