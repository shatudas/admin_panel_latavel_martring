<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Panel</title>

  <!-----include link------>
  @include('back_end.layouts.link.headerLink')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('back_end') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


  <!-----include header----->
  @include('back_end.layouts.header')

 <!-----include header----->
  @include('back_end.layouts.sidebar')


  @yield('content')


  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }}<a href="#"></a>.</strong>
    All rights reserved.
  </footer>

  <aside class="control-sidebar control-sidebar-dark"></aside>

</div>


<!--include foote link-->
 @include('back_end.layouts.link.footerLink')
</body>
</html>
