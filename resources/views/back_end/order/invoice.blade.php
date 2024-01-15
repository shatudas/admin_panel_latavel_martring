@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Customer Order</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer Order</li>
          </ol>
        </div>
      </div>
    </div>
   </section>


   <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-12">
          <div class="invoice p-3 mb-3">

            <div class="row">
              <div class="col-12">
                <h6>
                  <small class="float-right">Order Date: {{ $order->booking_date }}</small>
                </h6>
              </div>
            </div>


            <div class="row invoice-info">

              <div class="col-sm-4 invoice-col">
                From <br>
                <img src="{{ asset('front_end') }}/uploads/logo.png" class="img-fluid" style="height:40px;"><br>
                  Phone: (804) 123-5432<br>
                  Email: info@hotelbooking.com
              </div>


              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{ $customer_info->name }}</strong><br>
                  Phone:  {{ $customer_info->phone }}<br>
                  Email:  {{ $customer_info->email }}<br>
                  Address:{{ $customer_info->address }}
                </address>
              </div>


              <div class="col-sm-4 invoice-col">
                Order ID: {{ $order->order_no }}<br>
                Payment Method: {{ $order->payment_method }}<br>
              </div>

            </div>


            <div class="row pt-5">

              <div class="col-12 table-responsive">

                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>
                    <th>Room Name</th>
                    <th>Checkin Date</th>
                    <th>Checkout Date</th>
                    <th>Adult</th>
                    <th>Children</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>

                @php
                    $total =0;
                @endphp

                 @foreach($order_detrail as $item)

                 @php
                  $room_data =\App\Models\ Room::where('id',$item->room_id)->first();
                 @endphp

                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $room_data->name }}</td>
                    <td>{{ $item->checking_date }}</td>
                    <td>{{ $item->checkout_date }}</td>
                    <td>{{ $item->adult }}</td>
                    <td>{{ $item->children }}</td>
                    <td align="right" >$ <b>{{ $item->subtotal }}</b></td>
                  </tr>

                  @php
                      $total += $item->subtotal;
                  @endphp

                 @endforeach

                 <tr>
                    <td colspan="6" align="right"><b>Total</b></td>
                    <td align="right">$ <b> {{ $total }}</b></td>
                 </tr>

                  </tbody>
                </table>

            </div>

        </div>


        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-info btn-sm" onclick="printContent()">Print</button>
           </div>
        </div>


      </div>



    </div>
   </section>



  </div>



    <script>
        function printContent() {
            window.print();
        }
    </script>

    <style>
        #printText {
            display: block;
        }

        @media print {
            #printText {
                display: none;
            }
        }
    </style>

   @endsection

