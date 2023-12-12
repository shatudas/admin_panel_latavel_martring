@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Subscriber</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Subscriber</li>
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
              <h3 class="card-title"> Subscriber</h3>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('subscriber.send_email_submit') }}" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-12 mt-2">
                  <smail for="subject">Subject</smail>
                  <input type="text" name="subject" class="form-control form-control-sm" placeholder="Subject">
                  <font style="color:red">{{($errors->has('subject'))?($errors->first('subject')):'' }}</font>
                 </div>

                 <div class="col-md-12 mt-2">
                  <smail for="message">Message</smail>
                  <textarea type="text" name="message" rows="5" class="form-control form-control-sm" placeholder="massage"></textarea>
                  <font style="color:red">{{($errors->has('message'))?($errors->first('message')):'' }}</font>
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
     subject: {
      required: true,
     },
     massage: {
      required: true,
     },
    },

    messages: {
    subject: {
      required: "Please Enter Subject",
    },
    massage: {
      required: "Please Enter Massage",
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
