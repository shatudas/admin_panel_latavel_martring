<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-----include link------>
  @include('back_end.layouts.link.headerLink')

</head>
<body class="hold-transition login-page">
<div class="login-box">


  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>

      <form action="{{ route('admin.login-submit')  }}" method="post">
        @csrf

        <div class="input-group mb-3 mt-3">
          <input type="text" name="email" class="form-control @error('email') is-valid @enderror " placeholder="Email Address" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>


        @error('email')
          <div class="aleart text-danger">
            {{ $message  }}
          </div>
        @enderror

        <div class="input-group mb-3 mt-3">
          <input type="password" name="password" class="form-control @error('password') is-valid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>

        </div>

        @error('password')
            <div class="aleart text-danger">
                {{ $message }}
            </div>
          @enderror

          @if(session()->get('error'))
          <div class="aleart text-danger">{{ session()->get('error') }} </div>
          @endif

        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
        </div>


      <div class="social-auth-links text-center mb-3">
            <button class="btn btn-block btn-primary">Sign In</button>
      </div>


      </form>

      <p class="mb-1">
        <a href="{{ route('forget.password') }}"> forget Your password</a>
      </p>
    </div>
  </div>
</div>

 @include('back_end.layouts.link.footerLink')
</body>
</html>
