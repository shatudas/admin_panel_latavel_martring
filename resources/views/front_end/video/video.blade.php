@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Video Gallery</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="video-gallery">
            <div class="row">

                @foreach ($video as $videos)

                <div class="col-lg-3 col-md-4">
                    <div class="video-thumb">
                        <img src="http://img.youtube.com/vi/{{ $videos->Video_id }}/0.jpg" alt="">
                        <div class="bg"></div>
                        <div class="icon">
                            <a href="http://www.youtube.com/watch?v={{ $videos->Video_id }}" class="video-button"><i class="fa fa-play"></i></a>
                        </div>
                    </div>
                    <div class="video-caption">
                        {{ $videos->heading }}
                    </div>
                </div>

                @endforeach

            </div>


            <div class="row">
                <div class="col-lg-12" style="float:right; clear:left;">
                    {{  $video->links() }}
                </div>
            </div>



        </div>
    </div>
</div>


@endsection
