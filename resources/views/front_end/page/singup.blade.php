@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageheading->singheading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

             <form action="{{ route('customer.singup-submit') }}" method="post">
              @csrf

                <div class="login-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name">
                        <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" name="email">
                        <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <font style="color:red">{{($errors->has('password'))?($errors->first('password')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <label for="retype_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="retype_password">
                        <font style="color:red">{{($errors->has('retype_password'))?($errors->first('retype_password')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                    </div>
                    <div class="mb-3">
                        <a href="{{ route('customer.login') }}" class="primary-color">Existing User? Login Now</a>
                    </div>
                </div>
													</form>

            </div>
        </div>
    </div>
</div>


@endsection
