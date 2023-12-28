@extends('front_end.layout.index')
@section('frontend_content')


<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageheading->cartheading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row cart">
            <div class="col-md-12">

              @if(session()->has('cart_room_id'))

                <div class="table-responsive">
                    <table class="table table-bordered table-cart">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Serial</th>
                                <th>Photo</th>
                                <th>Room Info</th>
                                <th>Price/Night</th>
                                <th>Checkin</th>
                                <th>Checkout</th>
                                <th>Guests</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>

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
                                        <a href="{{ route('cart.delete',$arr_cart_room_id[$i]) }}" class="cart-delete-link" onclick="return confirm('Are you sure Cart Delete ?');"><i class="fa fa-times"></i></a>
                                    </td>
                                    <td>{{ $i+1 }}</td>
                                    <td><img src="{{ asset('upload/room/'.$data->featured_photo) }}"></td>
                                    <td>
                                        <a href="{{ route('single_room',$data->id) }}" class="room-name">{{ $data->name }}</a>
                                    </td>
                                    <td>{{ $data->price }} TK </td>
                                    <td>{{ $arr_cart_checkin_data[$i] }}</td>
                                    <td>{{ $arr_cart_checkout_data[$i] }}</td>
                                    <td>
                                        Adult: {{ $arr_cart_adults[$i] }}<br>
                                        Children: {{ $arr_cart_children[$i] }}
                                    </td>
                                    <td>

                                        Tk{{ $data->price * $diff }}
                                    </td>
                                </tr>

                                @php
                                 $total_price = $total_price + ($data->price * $diff );
                                @endphp

                            @endfor

                            <tr>
                                <td colspan="8">Total</td>
                                <td>{{ $total_price }} TK </td>
                            </tr>

                        </tbody>

                  </table>
                </div>

                <div class="checkout mb_20">
                    <a href="checkout.html" class="btn btn-primary bg-website">Checkout</a>
                </div>

                @else

                <h5> <center>Data Not Available</center> </h5>

              @endif


            </div>
        </div>
    </div>
</div>


@endsection
