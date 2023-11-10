<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <title>Hotel Website</title>

        <link rel="icon" type="image/png" href="{{ asset('front_end') }}/uploads/favicon.png">

        @include('front_end.layout.link.header_link')

    </head>
    <body>


        @include('front_end.layout.header')

        @yield('frontend_content')

        @include('front_end.layout.footer')


        <div class="scroll-top">
            <i class="fa fa-angle-up"></i>
        </div>

        @include('front_end.layout.link.footer')

   </body>
</html>
