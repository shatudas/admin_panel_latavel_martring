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


   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-8">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Add Slider Information</h3>
              <a href="{{ route('slider.view') }}" class="btn btn-primary btn-sm"  style="float:right;"><i class="fa fa-list"></i>&nbsp; View</a>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-6 mt-2">
                  <smail for="title">Title</smail>
                  <input type="text" name="title" class="form-control form-control-sm" placeholder="Slider Title">
                 </div>

                 <div class="col-md-6 mt-2">
                  <smail for="subtitle">Sub Title</smail>
                  <input type="text" name="subtitle" class="form-control form-control-sm" placeholder="Sub Title">
                 </div>

                 <div class="col-md-6 mt-2">
                  <smail for="button_text">Button Add</smail>
                  <input type="txt" name="button_text" class="form-control form-control-sm" placeholder="Button Add">
                 </div>

                 <div class="col-md-6 mt-2">
                  <smail for="button_url">Button URL</smail>
                  <input type="text" name="button_url" class="form-control form-control-sm" placeholder="Button URL">
                 </div>

                 <div class="form-group col-md-6 mt-2">
                   <smail for="button_url">Status</smail>
                    <select name="status" class="form-control form-control-sm">
                     <option value="">Select Role</option>
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                    </select>
                </div>

                 <div class="col-md-6 mt-2">
                  <smail for="image">Image</smail>
                  <input type="file" name="image" id="image" class="form-control form-control-sm">
                  <font style="color:red">{{($errors->has('image'))?($errors->first('image')):'' }}</font>
                 </div>

                 <div class="form-group col-md-6 mt-3">
                  <img id="showImage" src="{{url('upload/no_image.png')}}" style="width:100%; height:140px; border:1px solid #CCC;">
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

  <script>
   $(function (){
    $('#myForm').validate({
     rules: {
     image: {
      required: true,
     },
    },

    messages: {
     image: {
      required: "Please file upload",
    },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
    error.addClass('invalid-feedback');
    element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
    $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
    $(element).removeClass('is-invalid');
    }
    });
   });
  </script>

 @endsection
