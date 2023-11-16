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


   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-8">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Edit Blog Post</h3>
              <a href="{{ route('post.view') }}" class="btn btn-primary btn-sm"  style="float:right;">
              <i class="fa fa-list"></i>&nbsp; View</a>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('post.update',$alldata->id) }}" enctype="multipart/form-data" id="myForm" >
                 @csrf

                <div class="row">

                 <div class="col-md-12 mt-2">
                  <smail for="heading">Heading</smail>
                  <input type="text" name="heading" value="{{ $alldata->heading }}" class="form-control form-control-sm" placeholder="Heading">
                  <font style="color:red">{{($errors->has('heading'))?($errors->first('heading')):'' }}</font>
                 </div>

                 <div class="col-md-12 mt-2">
                  <smail for="short_content">Short content</smail><br>
                  <textarea rows="3" name="short_content"style="width:100%; border:1px solid #F1F1F1;" >
                    {!! $alldata->short_content !!}
                  </textarea>
                  <font style="color:red">{{($errors->has('short_content'))?($errors->first('short_content')):'' }}</font>
                 </div>

                 <div class="col-md-12 mt-2">
                  <smail for="content">Content</smail>
                  <textarea rows="5" name="content" id="summernote" >
                    {!! $alldata->content !!}
                  </textarea>
                  <font style="color:red">{{($errors->has('content'))?($errors->first('content')):'' }}</font>
                 </div>

                 <div class="form-group col-md-12 mt-2">
                   <smail for="status">Status</smail>
                    <select name="status" class="form-control form-control-sm">
                     <option value="">Select Role</option>
                     <option value="0" {{$alldata->status=="0"?"selected":""}}>Active</option>
                     <option value="1" {{$alldata->status=="1"?"selected":""}}>Inactive</option>
                    </select>
                  <font style="color:red">{{($errors->has('status'))?($errors->first('status')):'' }}</font>
                </div>

                 <div class="col-md-6 mt-2">
                  <smail for="image">Image</smail>
                  <input type="file" name="image" id="image" class="form-control form-control-sm">
                  <font style="color:red">{{($errors->has('image'))?($errors->first('image')):'' }}</font>
                 </div>

                 <div class="form-group col-md-6 mt-3">
                    <img id="showImage" src="{{!empty($alldata->image)?url('upload/blog_post/'.$alldata->image):url('upload/no_image.png')}}" style="width:100%; height:140px; border:1px solid #CCC;">
                 </div>

                 <div class="col-md-12 mt-2">
                    <button type="Update" class="btn btn-primary">Submit</button>
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
