@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3> Customer </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
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
            <h3 class="card-title">Customer List</h3>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr align="center">
               <th> Photo </th>
               <th> Name </th>
               <th> Phone </th>
               <th> Email </th>
               <th> Action </th>
              </tr>
             </thead>

             <tbody>
              @foreach($customer as $data)
              <tr>
                <td align="center">
                    <img src="{{!empty($data->photo)?url('upload/customer_profile/'.$data->photo):url('upload/no_image.png')}}" alt="" class="img-fluid" style="height:80px;">
                </td>
               <td>
                {{ $data->name }}
               </td>
               <td>
                {{ $data->phone }}
               </td>
               <td>
                {{ $data->email }}
               </td>

               <td align="center">
                @if($data->status == '0')
                    <a href="{{ route('customer.status',$data->id) }}" class="btn btn-sm btn-primary">
                        Active
                    </a>
                @else
                    <a href="{{ route('customer.status',$data->id) }}" class="btn btn-sm btn-danger">
                        Inactive
                    </a>
                @endif


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
