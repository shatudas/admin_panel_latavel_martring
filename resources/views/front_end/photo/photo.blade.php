@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Photo Gallery</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="photo-gallery">
            <div class="row">

                @foreach ($photo as $photos )

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="photo-thumb">
                        <img src="{{ asset('upload/photo/'.$photos->image) }}" alt="">
                        <div class="bg"></div>
                        <div class="icon">
                            <a href="{{ asset('upload/photo/'.$photos->image) }}" class="magnific"><i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="photo-caption">
                        {{ $photos->content }}
                    </div>
                </div>


                @endforeach

            </div>


            <div class="row">
                <div class="col-lg-12" style="float:right; clear:left;">
                    {{  $photo->links() }}
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
