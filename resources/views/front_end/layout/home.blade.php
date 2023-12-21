@extends('front_end.layout.index')
@section('frontend_content')

        <div class="slider">
            <div class="slide-carousel owl-carousel">

            @foreach ($slider as $data)

                <div class="item" style="background-image:url({{ asset('upload/slider/'.$data->image )}});">
                    <div class="bg"></div>
                    <div class="text">
                        <h2{{ $data->title }}</h2>
                        <p>
                            {{ $data->subtitle }}
                        </p>

                        @if($data->button_text != '')
                            <div class="button">
                                <a href="{{ $data->button_url }}" >{{ $data->button_text }}</a>
                             </div>
                        @endif

                    </div>
                </div>

            @endforeach

            </div>
        </div>


        <div class="search-section">
            <div class="container">
                <form action="cart.html" method="post">
                <div class="inner">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select name="" class="form-select">
                                    <option value="">Select Room</option>
                                    <option value="">Standard Couple Bed Room</option>
                                    <option value="">Delux Couple Bed Room</option>
                                    <option value="">Standard Four Bed Room</option>
                                    <option value="">Delux Four Bed Room</option>
                                    <option value="">VIP Special Room</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="" class="form-control" min="1" max="30" placeholder="Adults">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <input type="number" name="" class="form-control" min="1" max="30" placeholder="Children">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="home-feature">
            <div class="container">
                <div class="row">

                    @foreach($feature as $features)
                    <div class="col-md-3">
                        <div class="inner">
                            <div class="icon"><i class="{{ $features->icon }}"></i></div>
                            <div class="text">
                                <h2>{{ $features->heading }}</h2>
                                <p>
                                    {!!  $features->detalis  !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>

        @if($room != '')

        <div class="home-rooms">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Rooms and Suites</h2>
                    </div>
                </div>
                <div class="row">


                    @foreach ($room as $data)
                    <div class="col-md-3">
                        <div class="inner">
                            <div class="photo">
                                <img src="{{ asset('upload/room/'.$data->featured_photo) }}" alt="">
                            </div>
                            <div class="text">
                                <h2><a href="">{{ $data->name }}</a></h2>
                                <div class="price">
                                    $ {{ $data->price }} /night
                                </div>
                                <div class="button">
                                    <a href="{{ route('single_room',$data->id) }}" class="btn btn-primary">See Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="big-button">
                            <a href="" class="btn btn-primary">See All Rooms</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif

        <div class="testimonial" style="background-image: url({{ asset('front_end') }}/uploads/slide2.jpg)">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Our Happy Clients</h2>
                    </div>
                </div>
                <div class="row">


                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">
                            @foreach($testimonial as $testimonials)

                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('upload/Testimonial/'.$testimonials->image) }}" alt="">
                                </div>
                                <div class="text">
                                    <h4>{{ $testimonials->name }}</h4>
                                    <p>{{ $testimonials->designation }}</p>
                                </div>
                                <div class="description">
                                    <p>
                                        {!! $testimonials->massage !!}
                                    </p>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog-item">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="main-header">Latest Posts</h2>
                    </div>
                </div>
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
            </div>
        </div>

@endsection



