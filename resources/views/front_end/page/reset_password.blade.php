@extends('front_end.layout.index')
@section('frontend_content')


<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageheading->resetheading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">

                <form action="{{ route('customer.reset.password') }}" method="post">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">


                <div class="login-form">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <font style="color:red">{{($errors->has('password'))?($errors->first('password')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <label for="retype_password" class="form-label">Retype Password</label>
                        <input type="password" class="form-control" name="retype_password">
                        <font style="color:red">{{($errors->has('retype_password'))?($errors->first('retype_password')):'' }}</font>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary bg-website">Submit</button>
                        <a href="{{ route('customer.login') }}" class="primary-color">Back to Login Page</a>
                    </div>
                </div>

                </form>

            </div>
        </div>
    </div>
</div>



@endsection
