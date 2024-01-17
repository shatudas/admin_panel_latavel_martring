@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">


   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Available Roomt</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Available Room</li>
          </ol>
        </div>
      </div>
    </div>
   </section>


   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">

           <div class="card-header">
            <h3 class="card-title">Available Room : {{ date('d/m/y', strtotime($selected_date)) }}
                <strong></strong> </h3>
             <a href="{{ route('available.room') }}" class="btn btn-primary btn-sm"  style="float:right;">
			 Back </i></a>
            </div>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
               <th>Room Name</th>
               <th>Total Room</th>
               <th>Available Room</th>
              </tr>
             </thead>

             <tbody>
                @php
                    $room = App\Models\Room::get();
                @endphp

              @foreach($room as $data)
              <tr>
               <td>{{ $data->name }}</td>
               <td>{{ $data->total_room }}</td>
               <td>
                @php
                    $book_room_count = App\Models\Booked_room::where('room_id',$data->id)->where('booking_date',$selected_date)->count();
                @endphp

                {{ $data->total_room-$book_room_count }}


               </td>

              </tr>
              @endforeach
             </tbody>

            </table>
           </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  </div>

@endsection
