@extends('customer.layouts.index')
@section('customer_content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Customer Order</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
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
          <div class="card">

           <div class="card-header">
            <h3 class="card-title">Customer Order</h3>
            </div>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
               <th> Order No </th>
               <th> Payment Method </th>
               <th> Booking Date </th>
               <th> Paid Amount </th>
               <th align="center"> Action </th>
              </tr>
             </thead>

             <tbody>
              @foreach($alldata as $data)
              <tr>
               <td>
                {{ $data->order_no }}
               </td>
               <td>
                {{ $data->payment_method }}
               </td>
               <td>
                {{ $data->booking_date }}
               </td>
               <td>
                {{ $data->paid_amount }}
               </td>

               <td align="center">
                <a href="{{ route('customer.invoice',$data->id) }}" class="btn btn-sm btn-primary">
                 <i class="fa fa-eye"></i>
                </a>
               </td>

              </tr>

              @endforeach
             </tbody>

            </table>
           </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  </div>

@endsection
