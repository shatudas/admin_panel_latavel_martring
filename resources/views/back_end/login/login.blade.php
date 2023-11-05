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

      <form action="#" method="post">

        <div class="input-group mb-3 mt-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3 mt-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

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
        <a href="#" class="btn btn-block btn-primary">
         SignIn
        </a>
      </div>


      </form>

      <p class="mb-1">
        <a href="{{ route('forget.password') }}"> forgot Your password</a>
      </p>
    </div>
  </div>
</div>

 @include('back_end.layouts.link.footerLink')
</body>
</html>
