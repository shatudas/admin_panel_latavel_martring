<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>

  <!-----include link------>
  @include('back_end.layouts.link.headerLink')

</head>

<body class="hold-transition login-page">
<div class="login-box">

  <div class="card">
    <div class="card-body login-card-body py-5">
      <p class="login-box-msg">You forgot your password?</p>

      <form action="{{ route('admin.forget.password.submit') }}" method="post">
        @csrf

        <div class="input-group pb-3 mb-3">
          <input type="text" name="email" class="form-control  @error('email') is-valid @enderror" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @error('email')
         <div class="aleart text-danger">
           {{ $message }}
         </div>
        @enderror

        @if(session()->get('error'))
        <div class="aleart text-danger">{{ session()->get('error') }} </div>
        @endif

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
        </div>

      </form>

      <p class="mt-3 mb-1">
        <a href="{{ route('admin.login') }}">Login</a>
      </p>

    </div>
  </div>
</div>

 @include('back_end.layouts.link.footerLink')
</body>
</html>
