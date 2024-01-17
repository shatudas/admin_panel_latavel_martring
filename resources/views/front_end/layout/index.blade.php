<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="description" content="">
        <title>{{ $setting->title }}</title>

        <link rel="icon" type="image/png" href="{{ asset('upload/setting/'.$setting->favicon )}}">

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


							@if($errors->any())
								@foreach($errors->all() as $error)
									<script>
										iziToast.error({
										title: '',
										position: 'topRight',
										message: '{{ $error }}',
										});
									</script>
								@endforeach
							@endif


        @if(session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('error') }}',
            });
        </script>
        @endif

        @if(session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position: 'topRight',
                message: '{{ session()->get('success') }}',
            });
        </script>
        @endif

   </body>
</html>
