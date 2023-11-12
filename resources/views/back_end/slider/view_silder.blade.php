@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Slider</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Slider</li>
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
            <h3 class="card-title">Slider</h3>
             <a href="" class="btn btn-primary btn-sm"  style="float:right;">Add Slider</a>
            </div>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
               <th>Image</th>
               <th>Title</th>
               <th>Sub Title</th>
               <th>Status</th>
               <th>Action</th>
              </tr>
             </thead>

             <tbody>

              @foreach($alldata as $data)
              <tr>
               <td>
                <img src="{{!empty($data->image)?url('upload/slider/'.$data->image):url('upload/no_image.png')}}" alt="" class="img-fluid">
               </td>
               <td>{{ $data->title }}</td>
               <td>{{ $data->subtitle }}</td>

               <td>
                @if($data->status=='0')
                 <a href="" class="btn btn-primary btn-sm"> Publish </a>
                @else
                 <a href="" class="btn btn-danger btn-sm"> Draft </a>
                @endif
               </td>

               <td>
                <a title="Edit" href="" class="btn btn-sm btn-primary">
                 <i class="fa fa-edit"></i>
                </a>
                <a title="Delete" href="" id="delete" class="btn btn-sm btn-danger">
                 <i class="fa fa-trash"></i>
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
