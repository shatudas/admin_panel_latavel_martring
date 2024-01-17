@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Available Room</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Available Room</li>
          </ol>
        </div>
      </div>
    </div>
   </section>


   <!-- Main content -->
   <section class="content">

     <div class="container-fluid">
       <div class="row justify-content-center">

         <div class="col-md-6">
           <div class="card">

             <div class="card-header">
              <h3 class="card-title">Available Room</h3>
             </div>

             <div class="card-body">
               <div class="tab-content">

                <form method="POST" action="{{ route('available.room.search') }}" enctype="multipart/form-data" id="myForm">
                 @csrf

                <div class="row">

                 <div class="col-md-12 mt-2">
                  <smail for="heading">Search Date</smail>
                  <input type="date" name="selected_date" class="form-control form-control-sm">
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
