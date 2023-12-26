@extends('customer.layouts.index')
@section('customer_content')

 <div class="content-wrapper">

  <section class="content-header">
   <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h3>Profile</h3>
     </div>
     <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
       <li class="breadcrumb-item"><a href="{{ route('customer.home') }}">Home</a></li>
       <li class="breadcrumb-item active">Profile</li>
      </ol>
     </div>
    </div>
   </div>
  </section>

  <!-- Main content -->
  <section class="content">
   <form action="{{ route('customer.profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid">
     <div class="row justify-content-center">

      <div class="col-md-3">
       <div class="card card-primary card-outline">
        <div class="card-body box-profile">

         <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="{{ (!empty(Auth::guard('customer')->user()->photo))?url('upload/customer_profile/'.Auth::guard('customer')->user()->photo):url('upload/no_image.png') }}"
          alt="Profile Photo" type="file">
         </div>

         <h3 class="profile-username text-center">{{ Auth::guard('customer')->user()->name }}</h3>
         <p class="text-muted text-center">{{ Auth::guard('customer')->user()->email }}</p>
         <input type="submit" class="btn btn-primary btn-block" value="Update">


        </div>
       </div>
      </div>

      <div class="col-md-8">
       <div class="card">
        <div class="card-header p-2">
         <h3> <center>Edit Profile</center> </h3>
        </div>

        <div class="card-body">
         <div class="tab-content">
          <div class="row">

           <div class="col-md-6 mt-2">
            <smail for="name">Name</smail>
            <input type="text" name="name" class="form-control form-control-sm  @error('name') is-valid @enderror"  value="" placeholder="Name">
             @error('name')
              <div class="aleart text-danger"> {{ $message  }} </div>
             @enderror
           </div>

           <div class="col-md-6 mt-2">
            <smail for="email">Email</smail>
            <input type="text" name="email" class="form-control form-control-sm  @error('email') is-valid @enderror"  value="" placeholder="Email">
             @error('email')
              <div class="aleart text-danger"> {{ $message  }} </div>
             @enderror
           </div>


           <div class="col-md-6 mt-2">
            <smail for="phone">Phone</smail>
            <input type="text" name="phone" class="form-control form-control-sm  @error('phone') is-valid @enderror"  value="" placeholder="Phone">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="country">Country</smail>
            <input type="text" name="country" class="form-control form-control-sm  @error('country') is-valid @enderror"  value="" placeholder="Country">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="address">Address</smail>
            <input type="text" name="address" class="form-control form-control-sm  @error('address') is-valid @enderror"  value="" placeholder="Address">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="state">State</smail>
            <input type="text" name="state" class="form-control form-control-sm  @error('state') is-valid @enderror"  value="" placeholder="State">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="city">City</smail>
            <input type="text" name="city" class="form-control form-control-sm  @error('city') is-valid @enderror"  value="" placeholder="City">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="zip">Zip</smail>
            <input type="text" name="zip" class="form-control form-control-sm  @error('zip') is-valid @enderror"  value="" placeholder="Zip">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="password">Password</smail>
            <input type="password" name="password" class="form-control form-control-sm @error('password') is-valid @enderror"  value="" placeholder="Password">
           </div>


           <div class="col-md-6 mt-2">
            <smail for="retype_password">Retype Password</smail>
            <input type="password" name="retype_password" class="form-control form-control-sm @error('retype_password') is-valid @enderror"  value="" placeholder="Retype Password">
           </div>

           <div class="col-md-6 mt-2">
            <smail for="photo">Image</smail>
            <input type="file" name="photo" class="form-control form-control-sm @error('photo') is-valid @enderror">
             @error('photo')
              <div class="aleart text-danger">{{ $message  }} </div>
             @enderror
           </div>

          </div>

          </div>
         </div>
        </div>
       </div>

      </div>
     </div>
    </form>
   </section>

  </div>

@endsection
