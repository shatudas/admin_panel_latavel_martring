@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $post_view->heading }}</h2>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

<div class="page-content">
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-lg-8 col-md-12">
                <div class="featured-photo">
                    <img src="{{ asset('upload/blog_post/'.$post_view->image) }}" alt="">
                </div>
                <div class="sub">
                    <div class="item">
                        <b><i class="fa fa-clock-o"></i></b>
                        {{ date('d,M,Y', strtotime($post_view->updated_at)) }}
                    </div>
                    <div class="item">
                        <b><i class="fa fa-eye"></i></b>
                        {{ $post_view->view }}
                    </div>
                </div>
                <div class="main-text">
                    {!! $post_view->short_content !!}
                </div>
                <div class="main-text">
                    {!! $post_view->content !!}
                </div>

            </div>



        </div>
    </div>
</div>


@endsection
