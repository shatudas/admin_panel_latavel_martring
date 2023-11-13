@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Feature</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Feature</li>
          </ol>
        </div>
      </div>
    </div>
   </section>


   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-7">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Add Feature Information</h3>
              <a href="{{ route('feature.view') }}" class="btn btn-primary btn-sm"  style="float:right;"><i class="fa fa-list"></i>&nbsp; View</a>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('feature.store') }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                <div class="col-md-12 mt-2">
                  <smail for="icon">Icon</smail>
                  <input type="text" name="icon" class="form-control form-control-sm" placeholder="fa fa icon">
                  <font style="color:red">{{($errors->has('icon'))?($errors->first('icon')):'' }}</font>
                </div>

                 <div class="col-md-12 mt-2">
                  <smail for="heading">Heading</smail>
                  <input type="text" name="heading" class="form-control form-control-sm" placeholder="heading">
                  <font style="color:red">{{($errors->has('heading'))?($errors->first('heading')):'' }}</font>
                 </div>

                 <div class="col-md-12 mt-2">
                  <smail for="detalis">Detalis</smail>
                  <textarea name="detalis" id="" rows="3" style="width:100%;" class="form-control form-control-sm"></textarea>
                 </div>


                 <div class="form-group col-md-12 mt-2">
                   <smail for="button_url">Status</smail>
                    <select name="status" class="form-control form-control-sm">
                     <option value="">Select Role</option>
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                    </select>
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
