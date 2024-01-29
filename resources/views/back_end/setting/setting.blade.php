@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Setting</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Setting</li>
          </ol>
        </div>
      </div>
    </div>
   </section>


   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-12">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Update Setting Information</h3>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('setting.update',$setting->id) }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-6 mt-2">
                  <smail for="name">Site Name</smail>
                  <input type="text" name="name" class="form-control form-control-sm" value="{{ $setting->name }}" >
                 </div>

                 <div class="col-md-6 mt-2">
                  <smail for="title">Site Title</smail>
                  <input type="text" name="title" class="form-control form-control-sm" value="{{ $setting->title }}" >
                 </div>

                 <div class="col-md-3 mt-2">
                  <smail for="logo">Logo</smail>
                  <input type="file" name="logo" id="image" class="form-control form-control-sm">
                  <font style="color:red">{{($errors->has('logo'))?($errors->first('logo')):'' }}</font>
                 </div>

                 <div class="form-group col-md-3 mt-3" align="center">
                  <img id="showImage" src="{{!empty($setting->logo)?url('upload/setting/'.$setting->logo):url('upload/no_image.png')}}" style="width:140px; height:60px; border:1px solid #CCC;">
                 </div>

                 <div class="col-md-3 mt-2">
                  <smail for="favicon">Faviocn</smail>
                  <input type="file" name="favicon" id="imageone" class="form-control form-control-sm">
                  <font style="color:red">{{($errors->has('favicon'))?($errors->first('favicon')):'' }}</font>
                 </div>

                  <div class="form-group col-md-3 mt-3" align="center">
                   <img id="showImageone" src="{{!empty($setting->favicon)?url('upload/setting/'.$setting->favicon):url('upload/no_image.png')}}" style="width:100px; height:60px; border:1px solid #CCC;">
                  </div>


                  <div class="col-md-6 mt-2">
                    <smail for="top_bar_phone">Top Bar Phone</smail>
                    <input type="text" name="top_bar_phone" class="form-control form-control-sm" value="{{ $setting->top_bar_phone }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="top_bar_email">Top Bar Email</smail>
                    <input type="text" name="top_bar_email" class="form-control form-control-sm" value="{{ $setting->top_bar_email }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_feature_status">Home Feature</smail>
                    <select name="home_feature_status" class="form-control form-control-sm">
                        <option value="Show" @if($setting->home_feature_status == 'Show') selected  @endif>Show</option>
                        <option value="Hide" @if($setting->home_feature_status == 'Hide') selected  @endif>Hide</option>
                    </select>
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_testimonial_status">Testimonial Status</smail>
                    <select name="home_testimonial_status" class="form-control form-control-sm">
                        <option value="Show" @if($setting->home_testimonial_status == 'Show') selected  @endif>Show</option>
                        <option value="Hide" @if($setting->home_testimonial_status == 'Hide') selected  @endif>Hide</option>
                    </select>
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_room_total">Home Room Total</smail>
                    <input type="text" name="home_room_total" class="form-control form-control-sm" value="{{ $setting->home_room_total }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_room_status">Room Status</smail>
                    <select name="home_room_status" class="form-control form-control-sm">
                        <option value="Show" @if($setting->home_room_status == 'Show') selected  @endif>Show</option>
                        <option value="Hide" @if($setting->home_room_status == 'Hide') selected  @endif>Hide</option>
                    </select>
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_total_post">Home Total Post</smail>
                    <input type="text" name="home_total_post" class="form-control form-control-sm" value="{{ $setting->home_total_post }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="home_post_status">Home Post Status</smail>
                    <select name="home_post_status" class="form-control form-control-sm">
                        <option value="Show" @if($setting->home_post_status == 'Show') selected  @endif>Show</option>
                        <option value="Hide" @if($setting->home_post_status == 'Hide') selected  @endif>Hide</option>
                    </select>
                   </div>



                   <div class="col-md-6 mt-2">
                    <smail for="footer_phone">Footer Phone</smail>
                    <input type="text" name="footer_phone" class="form-control form-control-sm" value="{{ $setting->footer_phone }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="footer_email">Footer Email</smail>
                    <input type="text" name="footer_email" class="form-control form-control-sm" value="{{ $setting->footer_email }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="footer_address">Address</smail>
                    <textarea type="text" name="footer_address" class="form-control form-control-sm"  >{!! $setting->footer_address !!}</textarea>
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="footer_copy_right">Copy Right</smail>
                    <input type="text" name="footer_copy_right" class="form-control form-control-sm" value="{{ $setting->footer_copy_right }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="facebook">Facebook</smail>
                    <input type="text" name="facebook" class="form-control form-control-sm" value="{{ $setting->facebook }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="twitter">Twitter</smail>
                    <input type="text" name="twitter" class="form-control form-control-sm" value="{{ $setting->twitter }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="linkedin">Linkedin</smail>
                    <input type="text" name="linkedin" class="form-control form-control-sm" value="{{ $setting->linkedin }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="pinterest">Pinterest</smail>
                    <input type="text" name="pinterest" class="form-control form-control-sm" value="{{ $setting->pinterest }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="analytic_id">Analytic Id</smail>
                    <input type="text" name="analytic_id" class="form-control form-control-sm" value="{{ $setting->analytic_id }}" >
                   </div>


                   <div class="col-md-6 mt-2">
                    <smail for="themecolor">Theme Color</smail>
                    <input type="text" name="themecolor" class="form-control form-control-sm" value="{{ $setting->themecolor }}" >
                   </div>

                   <div class="col-md-6 mt-2">
                    <smail for="themebackgroung">Theme Background Color</smail>
                    <input type="text" name="themebackgroung" class="form-control form-control-sm" value="{{ $setting->themebackgroung }}" >
                   </div>



                 <div class="col-md-12 mt-2">
                    <button type="submit" class="btn btn-primary">Update</button>
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
