@extends('back_end.layouts.index')
@section('content')


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Complated Order : {{ $complated_order }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> padding Order : {{ $padding_order }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Active Customer : {{ $active_customer }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Padding Customer : {{ $padding_customer }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Total Room Type : {{ $total_room }}</b></span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text"><b> Total Subscriber : {{ $subscriber }}</b></span>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Recent Order list</h3>
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
                                    @foreach($order as $data)
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
                                            <a href="{{ route('admin.invoice',$data->id) }}" class="btn btn-sm btn-primary">
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
