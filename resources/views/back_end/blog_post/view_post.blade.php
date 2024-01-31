@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Blog Post</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Blog Post</li>
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
            <h3 class="card-title">Blog Post</h3>
             <a href="{{ route('post.add') }}" class="btn btn-primary btn-sm"  style="float:right;">
														<i class="fa fa-plus-circle"></i> Add New</a>
            </div>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
			   <th>Image</th>
               <th >Heading</th>
               <th style="width:40%;">Sort Detalis</th>
               <th>Status</th>
               <th>Action</th>
              </tr>
             </thead>

             <tbody>

              @foreach($alldata as $data)
              <tr>
               <td>
                <img src="{{!empty($data->image)?url('upload/blog_post/'.$data->image):url('upload/no_image.png')}}" alt="" class="img-fluid" style="width:100px;">
               </td>
               <td>{{ $data->heading }}</td>
               <td>{{ $data->short_content }}</td>

               <td>
                @if($data->status=='0')
                 <a href="{{ route('post.inactive',$data->id) }}" class="btn btn-primary btn-sm"> Publish </a>
                @else
                 <a href="{{ route('post.active',$data->id) }}" class="btn btn-danger btn-sm"> Draft </a>
                @endif
               </td>

               <td>
                <a title="Edit" href="{{ route('post.edit',$data->id) }}" class="btn btn-sm btn-primary">
                 <i class="fa fa-edit"></i>
                </a>
                <a title="Delete" href="{{route('post.delete',$data->id)}}" id="delete" class="btn btn-sm btn-danger">
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
