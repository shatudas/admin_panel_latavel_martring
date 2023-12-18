@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
         <h3> Room </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
           <li class="breadcrumb-item active">Room</li>
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
         <h3 class="card-title">Add hotal Room</h3>
          <a href="{{ route('room.view') }}"class="btn btn-primary btn-sm" style="float:right;">
		   <i class="fa fa-list"></i>&nbsp; View
          </a>
        </div>

        <div class="card-body">
         <div class="tab-content">
          <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data" id="myForm">
           @csrf
           <div class="row">

            <div class="col-md-6 mt-3">
             <smail for="name"><b>Name</b></smail>
             <input type="text" name="name" class="form-control form-control-sm" placeholder="Enter Name">
             <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
            </div>

            <div class="col-md-6 mt-3">
             <smail for="price"><b>Price</b></smail>
             <input type="number" name="price" class="form-control form-control-sm" placeholder="Enter Price">
             <font style="color:red">{{($errors->has('price'))?($errors->first('price')):'' }}</font>
            </div>

            <div class="col-md-12 mt-3">
             <smail for="description"><b>Description</b></smail>
             <textarea type="text" name="description" id="summernote" class="form-control form-control-sm" rows="10"></textarea>
             <font style="color:red">{{($errors->has('description'))?($errors->first('description')):'' }}</font>
            </div>

            <div class="col-md-6 mt-3">
             <smail for="total_room"><b>Total Room</b></smail>
             <input type="number" name="total_room" class="form-control form-control-sm" min="1" placeholder="Enter Total Room">
             <font style="color:red">{{($errors->has('total_room'))?($errors->first('total_room')):'' }}</font>
            </div>

            <div class="col-md-6 mt-3">
             <smail for="size"><b>size</b></smail>
             <input type="text" name="size" class="form-control form-control-sm" placeholder="Room Size">
            </div>

            <div class="col-md-6 mt-3">
             <smail for="total_bad"><b>Bad</b></smail>
             <input type="number" name="total_bad" class="form-control form-control-sm" min="1" placeholder="Type Total Bad">
             <font style="color:red">{{($errors->has('total_bad'))?($errors->first('total_bad')):'' }}</font>
            </div>

            <div class="col-md-6 mt-3">
             <smail for="total_bathroom"><b>Bathroom</b></smail>
             <input type="number" name="total_bathroom" class="form-control form-control-sm" min="1" placeholder="Type Total Bathroom">

            </div>

            <div class="col-md-6 mt-3">
             <smail for="total_balconic"><b>Balconics</b></smail>
             <input type="number" name="total_balconic" class="form-control form-control-sm" placeholder="Type Total Balconic">
            </div>

            <div class="col-md-6 mt-3">
             <smail for="total_guest"><b>Guest</b></smail>
             <input type="number" name="total_guest" class="form-control form-control-sm" min="1" placeholder="Type Total Guest">
             <font style="color:red">{{($errors->has('total_guest'))?($errors->first('total_guest')):'' }}</font>
            </div>

            <div class="col-md-6 mt-3">
             <smail for="video_id"><b>video Link</b></smail>
             <input type="text" name="video_id" class="form-control form-control-sm" placeholder="Type Video URL">
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

            <div class="col-md-12 mt-3">
             <smail for="amenities"><b>Amenities</b></smail><br>

             <div class="btn-group btn-sm" role="group" aria-label="Basic checkbox toggle button group mt-2">
              @php
               $i=0;
              @endphp
              @foreach($amenity as $val)
              @php
               $i++;
              @endphp
              <input type="checkbox" class="btn-check" name="amenities[]" value="{{ $val->id }}" id="btncheck1{{ $i }}" autocomplete="off">
              <label class="btn btn-sm btn-outline-primary" for="btncheck1{{ $i }}">{{ $val->name }}</label>
              @endforeach
            </div>

            </div>

            <div class="col-md-6 mt-3">
             <smail for="image">Image</smail>
             <input type="file" name="featured_photo" id="image" class="form-control form-control-sm">
             <font style="color:red">{{($errors->has('featured_photo'))?($errors->first('featured_photo')):'' }}</font>
            </div>

            <div class="form-group col-md-6 mt-3">
             <img id="showImage" src="{{url('upload/no_image.png')}}" style="width:150px; height:120px; border:1px solid #CCC;">
            </div>

            <div class="col-md-12 mt-2">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>

           </div>
          </form>
         </div>
        </div>

       </div>
      </div>
     </div>
    </div>
   </section>
  </div>

 @endsection
