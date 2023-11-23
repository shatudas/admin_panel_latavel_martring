@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Contact</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact</li>
          </ol>
        </div>
      </div>
    </div>
   </section>

   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-9">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Update Contact</h3>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('contact.update',$alldata->id) }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-12 mt-2">
                  <smail for="heading">Heading</smail>
                  <input type="text" name="heading" value="{{ $alldata->heading }}" class="form-control form-control-sm" placeholder="Heading">
                 </div>

                 <div class="col-md-12 mt-2">
                  <smail for="map">Location</smail>
                  <textarea name="map" class="form-control form-control-sm" id="" rows="7">
                    {!! $alldata->map !!}
                  </textarea>
                 </div>

                 <div class="form-group col-md-12 mt-2">
                   <smail for="button_url">Status</smail>
                    <select name="status" class="form-control form-control-sm">
                     <option value="" >Select Role</option>
                     <option value="0" {{ $alldata->status=="0"?"selected":"" }}>Active</option>
                     <option value="1" {{ $alldata->status=="1"?"selected":"" }}>Inactive</option>
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

 @endsection
