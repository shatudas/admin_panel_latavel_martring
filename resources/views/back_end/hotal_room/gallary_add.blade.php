@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <h3> Room Gallary </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
           <li class="breadcrumb-item active">Gallary</li>
         </ol>
        </div>
      </div>
    </div>
   </section>

   <!-- Main content -->
   <section class="content">

    <div class="container-fluid">
     <div class="row justify-content-center">

      <div class="col-md-10">
       <div class="card">

        <div class="card-header">
         <h3 class="card-title">Add Gallery</h3>
          <a href="{{ route('room.view') }}"class="btn btn-primary btn-sm" style="float:right;">
		   <i class="fa fa-list"></i>&nbsp; View
          </a>
        </div>

        <div class="card-body">
         <div class="tab-content">
          <form method="POST" action="{{ route('room.gallery.store',$room_val->id) }}" enctype="multipart/form-data" id="myForm">
           @csrf
           <div class="row">

            <div class="col-md-6 mt-3">
             <smail for="image">Image</smail>
             <input type="file" name="photo" id="image" class="form-control form-control-sm">
             <font style="color:red">{{($errors->has('photo'))?($errors->first('photo')):'' }}</font>
            </div>

            <div class="form-group col-md-6 mt-3">
             <smail for="status"><b>Status</b></smail>
             <select name="status" class="form-control form-control-sm">
              <option value="">Select Role</option>
              <option value="0">Active</option>
              <option value="1">Inactive</option>
             </select>
             <font style="color:red">{{($errors->has('status'))?($errors->first('status')):'' }}</font>
            </div>

            <div class="form-group col-md-6 mt-3">
             <img id="showImage" src="{{url('upload/no_image.png')}}" style="width:200px; height:120px; border:1px solid #CCC;">
            </div>


            <div class="col-md-12 mt-2">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>

           </div>
          </form>
         </div>
        </div>


        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
               <th>Image</th>
               <th>Status</th>
               <th>Action</th>
              </tr>
             </thead>

             <tbody>

              @foreach($room_gallery as $data)
              <tr>
               <td>
                <img src="{{!empty($data->photo)?url('upload/room_gallery/'.$data->photo):url('upload/no_image.png')}}" alt="" class="img-fluid" style="height:120px;"   >
               </td>
               <td align="center">
                @if($data->status=='0')
                 <a href="{{ route('room.gallery.inactive',$data->id) }}" class="btn btn-primary btn-sm"> Publish </a>
                @else
                 <a href="{{ route('room.gallery.active',$data->id) }}" class="btn btn-danger btn-sm"> Draft </a>
                @endif
               </td>
               <td align="center">
                <a title="Delete" href="{{route('room.gallery.delete',$data->id)}}" id="delete" class="btn btn-sm btn-danger">
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
