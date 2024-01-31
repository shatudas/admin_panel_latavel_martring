<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Admin Panel </title>

        <link rel="icon" type="image/png" href="{{ asset('upload/setting/'.$setting->favicon )}}">

        <!-----include link------>
        @include('back_end.layouts.link.headerLink')

    </head>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('upload/setting/'.$setting->logo )}}" alt="AdminLTELogo" height="60" width="60">
            </div>


            <!-----include header----->
            @include('back_end.layouts.header')

            <!-----include header----->
            @include('back_end.layouts.sidebar')


            @yield('content')


            <footer class="main-footer">
                {{ $setting->footer_copy_right }}
            </footer>

            <aside class="control-sidebar control-sidebar-dark"></aside>

        </div>


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
			    iziToast.error({
				title: '',
				position: 'topRight',
				message: '{{ session()->get('success') }}',
				});
	        </script>
        @endif


        <!--include foote link-->
        @include('back_end.layouts.link.footerLink')


        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload=function(e){
                $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#imageone').change(function(e){
                var reader = new FileReader();
                reader.onload=function(e){
                $('#showImageone').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

        <script type="text/javascript">
            $(function()
            {
            $(document).on('click','#delete',function(e)
            {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = link;
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success')}
            })
            });
            });
        </script>

        <script>
            $(function () {
            // Summernote
            $('#summernote').summernote()

            // CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
            })
        </script>


    </body>
</html>
