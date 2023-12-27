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

                         $arr_cart_room_id= array();
                           $i = 0;
                           foreach(session()->get('cart_room_id') as $value){
                               $arr_cart_room_id[$i] = $value;
                               $i++;
                           }

                          $arr_cart_checkin_data= array();
                          $i = 0;
                          foreach(session()->get('cart_checkin_data') as $value){
                           $arr_cart_checkin_data[$i] = $value;
                           $i++;
                          }

                          $arr_cart_checkout_data= array();
                          $i = 0;
                          foreach(session()->get('cart_checkout_data') as $value){
                           $arr_cart_checkout_data[$i] = $value;
                           $i++;
                          }

                          $arr_cart_adults= array();
                          $i = 0;
                          foreach(session()->get('cart_adults') as $value){
                           $arr_cart_adults[$i] = $value;
                           $i++;
                          }

                          $arr_cart_children= array();
                          $i = 0;
                          foreach(session()->get('cart_children') as $value){
                           $arr_cart_children[$i] = $value;
                           $i++;
                          }

                      @endphp


                    @php
                    for ($i = 0; $i < count($arr_cart_room_id); $i++) {
                     $data = DB::table('rooms')->where('id',$arr_cart_room_id[$i])->first();
                    @endphp

                    <tr>
                     <td>
                      <a href="" class="cart-delete-link" onclick="return confirm('Are you sure?');"><i class="fa fa-times"></i></a>
                     </td>
                     <td>1</td>
                     <td><img src="{{ asset('upload/room/'.$data->featured_photo) }}"></td>
                     <td>
                      <a href="room-detail.html" class="room-name">{{ $data->name }}</a>
                     </td>
                     <td>{{ $data->price }} TK </td>
                     <td>{{ $arr_cart_checkin_data[$i] }}</td>
                     <td>{{ $arr_cart_checkout_data[$i] }}</td>
                     <td>
                      Adult: {{ $arr_cart_adults[$i] }}<br>
                      Children: {{ $arr_cart_children[$i] }}
                     </td>
                     <td>$60</td>
                    </tr>

                    @php
                    }
                    @endphp



                  </tbody>

                  </table>
                </div>

                <div class="checkout mb_20">
                    <a href="checkout.html" class="btn btn-primary bg-website">Checkout</a>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
