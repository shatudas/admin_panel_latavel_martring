<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reset Password</title>

  <!-----include link------>
  @include('back_end.layouts.link.headerLink')

</head>

<body class="hold-transition login-page">
<div class="login-box">

  <div class="card">
    <div class="card-body login-card-body py-5">
      <p class="login-box-msg"> Reset your password?</p>

      <form action="{{ route('admin.reset.password') }}" method="post">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="input-group pb-3 mb-3">
          <input type="password" name="password" class="form-control  @error('password') is-valid @enderror" placeholder="password">
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


        <div class="input-group pb-3 mb-3">
            <input type="password" name="retype_password" class="form-control  @error('retype_password') is-valid @enderror" placeholder="reset password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
        </div>


        @error('retype_password')
         <div class="aleart text-danger">
           {{ $message }}
         </div>
        @enderror



        @if(session()->get('error'))
        <div class="aleart text-danger">{{ session()->get('error') }} </div>
        @endif

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Upload</button>
          </div>
        </div>

      </form>



    </div>
  </div>
</div>

 @include('back_end.layouts.link.footerLink')
</body>
</html>
