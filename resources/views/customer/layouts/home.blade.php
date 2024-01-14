@extends('customer.layouts.index')
@section('customer_content')


<div class="content-wrapper">

 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0">Dashboard</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Dashboard</li>
         </ol>
       </div>
     </div>
    </div>
 </div>

 <section class="content">
   <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <div class="info-box-content" align="center">
                  <span class="info-box-text"><b> Complated Order : {{ $complated }}</b></span>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <div class="info-box-content" align="center">
                    <span class="info-box-text"><b> padding Order : {{ $padding }}</b></span>
                  </div>
                </div>
              </div>

        </div>


   </div>
 </section>

</div>

@endsection
