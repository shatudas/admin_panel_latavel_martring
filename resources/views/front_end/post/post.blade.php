@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Blog</h2>
            </div>
        </div>
    </div>
</div>

<div class="blog-item">
    <div class="container">
        <div class="row">

            @foreach ($post as $posts)

            <div class="col-md-4">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('upload/blog_post/'.$posts->image) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="{{ route('post_view',$posts->id) }}">{{ $posts->heading }}</a></h2>
                        <div class="short-des">
                            <p>
                            {!! $posts->short_content !!}
                            </p>
                        </div>
                        <div class="button">
                            <a href="{{ route('post_view',$posts->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="row">
            <div class="col-lg-12" style="float:right; clear:left;">
                {{  $post->links() }}
            </div>
        </div>
    </div>
</div>


@endsection
