@extends('front_end.layout.index')
@section('frontend_content')


<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageheading->checkoutheading }}</h2>
            </div>
        </div>
    </div>
</div>


<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 checkout-left">

                <form action="" method="post" class="frm_checkout" _lpchecked="1">
                    <input type="hidden" name="ff__checkout" value="1">
                    <div class="billing-info">
                        <h4 class="mb_30">Billing Information</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Name:</label>
                                <input type="text" class="form-control mb_15" name="billing_name" value="Patrick Henderson">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Email Address:</label>
                                <input type="text" class="form-control mb_15" name="billing_email" value="patrick@gmail.com">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Phone Number:</label>
                                <input type="text" class="form-control mb_15" name="billing_phone" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Country:</label>
                                <input type="text" class="form-control mb_15" name="billing_country" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Address:</label>
                                <input type="text" class="form-control mb_15" name="billing_address" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">State:</label>
                                <input type="text" class="form-control mb_15" name="billing_state" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">City:</label>
                                <input type="text" class="form-control mb_15" name="billing_city" value="">
                            </div>
                            <div class="col-lg-6">
                                <label for="">Zip Code:</label>
                                <input type="text" class="form-control mb_15" name="billing_zip" value="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-website mb_30">Continue to payment</button>
                </form>

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
                                    $data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();
                                    $d1 = explode('/', $arr_cart_checkin_data[$i]);
                                    $d2 = explode('/', $arr_cart_checkout_data[$i]);

                                    $d1_new = $d1[2] . '-' . $d1[1] . '-' . $d1[0];
                                    $d1_new_replace= str_replace(' ', '', $d1_new);

                                    $d2_new = $d2[2] . '-' . $d2[1] . '-' . $d2[0];
                                    $d2_new_replace= str_replace(' ', '', $d2_new);

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
                                     $total_price = $total_price + ($data->price * $diff );
                                    @endphp

                                    @php
                                    $total_price = $total_price + ($data->price * $diff );
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


@endsection
