
@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $pageheading->roomheading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="home-rooms">
    <div class="container">

        <div class="row">


            @foreach ($room_all as $data)
            <div class="col-md-3">
                <div class="inner">
                    <div class="photo">
                        <img src="{{ asset('upload/room/'.$data->featured_photo) }}" alt="">
                    </div>
                    <div class="text">
                        <h2><a href="">{{ $data->name }}</a></h2>
                        <div class="price">
                            TK {{ $data->price }} /night
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
            <div class="col-lg-12">
                {{ $room_all->links() }}
            </div>
        </div>





    </div>
</div>




@endsection
