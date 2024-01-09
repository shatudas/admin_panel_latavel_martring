
@extends('front_end.layout.index')
@section('frontend_content')

<div class="page-top">
  <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Room: {{ $room_detali->name }}</h2>
            </div>
        </div>
   </div>
</div>


<div class="page-content room-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-12 left">

                <div class="room-detail-carousel owl-carousel">

                 <div class="item" style="background-image:url({{ asset('upload/room/'.$room_detali->featured_photo) }});">
                        <div class="bg"></div>
                    </div>

                    @foreach ($room_detali->roomGallery as $item)
                    <div class="item" style="background-image:url({{ asset('upload/room_gallery/'.$item->photo) }});">
                        <div class="bg"></div>
                    </div>
                    @endforeach

                </div>

                <div class="description">
                    <p>
                        {!! $room_detali->description !!}
                    </p>
                </div>

                <div class="amenity">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Amenities</h2>
                        </div>
                    </div>
                    <div class="row">


                        @php
                            $amenitie_arr = explode(',',$room_detali->amenities);
                            for ($j=0; $j <count($amenitie_arr); $j++)
                            {
                                $tem_data = App\Models\Amenity::where('id',$amenitie_arr[$j])->first();

                                echo '<div class="col-lg-6 col-md-12">';
                                echo '<div class="item"><i class="fa fa-check-circle"></i> '.$tem_data->name.' </div>';
                                echo '</div>';
                            }
                        @endphp

                    </div>
                </div>


                <div class="feature">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Features</h2>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Room Size</th>
                                <td>{{ $room_detali->size }}</td>
                            </tr>
                            <tr>
                                <th>Number of Beds</th>
                                <td>{{ $room_detali->total_bad }}</td>
                            </tr>
                            <tr>
                                <th>Number of Bathrooms</th>
                                <td>{{ $room_detali->total_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>Number of Balconies</th>
                                <td>{{ $room_detali->total_balconics }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                @if($room_detali->video_id !='')

                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $room_detali->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                @endif


            </div>

            <div class="col-lg-4 col-md-5 col-sm-12 right">

                <div class="sidebar-container" id="sticky_sidebar">

                    <form action="{{ route('booking.submit') }}" method="post">
                        @csrf

                        <div class="widget">
                            <h2>Room Price per Night</h2>
                            <div class="price">
                               $ {{ $room_detali->price }} <small>USD</small>
                            </div>
                        </div>
                        <div class="widget">
                            <h2>Reserve This Room</h2>
                            <input type="hidden" name="room_id" value="{{ $room_detali->id }}">
                            <div class="form-group mb_20">
                                <label for="">Check in & Check out</label>
                                <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="05/06/2022 - 06/06/2022">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Adult</label>
                                <input type="number" name="adults" class="form-control" min="1" max="5" placeholder="Adults">
                            </div>
                            <div class="form-group mb_20">
                                <label for="">Children</label>
                                <input type="number" name="children" class="form-control" min="0" max="5" placeholder="Children">
                            </div>
                            <button type="submit" class="book-now">Add to Cart</button>
                        </div>


                    </form>


                    </div>

                </div>


            </div>


        </div>
    </div>
</div>




@endsection
