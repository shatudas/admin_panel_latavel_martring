@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3> Sing Up Page </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active"> Sing Up Page </li>
          </ol>
        </div>
      </div>
    </div>
   </section>

   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-7">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Update Page Setup</h3>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('singup_heading.update',$alldata->id) }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-12 mt-2">
                  <smail for="singupheading">Heading</smail>
                  <input type="text" name="singupheading" value="{{ $alldata->singupheading }}" class="form-control form-control-sm" placeholder="Heading">
                 </div>

                 <div class="form-group col-md-12 mt-2">
                   <smail for="singupstatus">Status</smail>
                    <select name="singupstatus" class="form-control form-control-sm">
                     <option value="" >Select Role</option>
                     <option value="0" {{ $alldata->singupstatus=="0"?"selected":"" }}>Active</option>
                     <option value="1" {{ $alldata->singupstatus=="1"?"selected":"" }}>Inactive</option>
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
