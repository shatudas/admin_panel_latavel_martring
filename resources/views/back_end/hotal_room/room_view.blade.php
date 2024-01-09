@extends('back_end.layouts.index')
@section('content')

  <div class="content-wrapper">

   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3> Hotel Room </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            <li class="breadcrumb-item active">Hotel Room</li>
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
            <h3 class="card-title">View Hotel Room</h3>
             <a href="{{ route('room.add') }}" class="btn btn-primary btn-sm"  style="float:right;"><i class="fa fa-plus-circle"></i> Add New</a>
            </div>

           <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">

             <thead>
              <tr>
               <th> Photo </th>
               <th> Name </th>
               <th> Price (Par Night) </th>
               <th align="center"> Status </th>
               <th align="center"> Action </th>
              </tr>
             </thead>

             <tbody>
              @foreach($alldata as $data)
              <tr>
                <td align="center">
                    <img src="{{!empty($data->featured_photo)?url('upload/room/'.$data->featured_photo):url('upload/no_image.png')}}" alt="" class="img-fluid" style="height:100px;">
                </td>
               <td>
                {{ $data->name }}
               </td>
               <td>
                $ {{ $data->price }} USD
               </td>

               <td align="center">
                @if($data->status=='0')
                 <a href="{{ route('room.inactive',$data->id) }}" class="btn btn-primary btn-sm"> Publish </a>
                @else
                 <a href="{{ route('room.active',$data->id) }}" class="btn btn-danger btn-sm"> Draft </a>
                @endif
               </td>

               <td align="center">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModalCenter" title="View Detalis">
                 <i class="fa fa-eye"></i>
                </button>

                <a href="{{ route('room.gallery.add',$data->id) }}" class="btn btn-sm btn-success" title="Add Room Image">
                <i class="fa fa-plus"></i>
                </a>

                <a href="{{ route('room.edit',$data->id) }}" class="btn btn-sm btn-primary" title="Sata Edit">
                 <i class="fa fa-edit"></i>
                </a>
                <a href="{{route('room.delete',$data->id)}}" id="delete" class="btn btn-sm btn-danger" title="Data Delete">
                 <i class="fa fa-trash"></i>
                </a>
               </td>

              </tr>



              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                  <div class="modal-content border-0">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Hotal Room Detalis</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <div class="container-fluid">

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <center>
                                 <img src="{{!empty($data->featured_photo)?url('upload/room/'.$data->featured_photo):url('upload/no_image.png')}}" alt="" class="img-fluid" style="width:400px;">
                                </center>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">Room Type</div>
                            <div class="col-md-8"> <strong>{{ $data->name }}</strong> </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">Description</div>
                            <div class="col-md-8">{!! $data->description !!}</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">Price <small> (Par Night)</small></div>
                            <div class="col-md-8"><b>$ {{ $data->price }} </b> <small>USD</small> </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">Total Room</div>
                            <div class="col-md-8">{{ $data->total_room }} Room</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Room size</div>
                            <div class="col-md-8">{{ $data->size }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Total Bad</div>
                            <div class="col-md-8">{{ $data->total_bad }} Bed</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Bathroom</div>
                            <div class="col-md-8">{{ $data->total_bathroom }} Bathroom</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Balconic</div>
                            <div class="col-md-8">{{ $data->total_balconics }} Bathroom</div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Guest</div>
                            <div class="col-md-8">{{ $data->total_guest }} Guest Alllow</div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-4"> Amenitie</div>
                            <div class="col-md-8">
                              @php
                                $amenitie_arr = explode(',',$data->amenities);
                                for ($j=0; $j <count($amenitie_arr); $j++)
                                {
                                  $tem_data = App\Models\Amenity::where('id',$amenitie_arr[$j])->first();
                                  echo $tem_data->name. ',' .'&nbsp;';
                                }
                              @endphp
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4"> Room Status</div>
                            <div class="col-md-8">
                                @if($data->status=='0')
                                 Active
                                @else
                                 Draft
                                @endif
                            </div>
                        </div>


                        <div class="row mt-2">
                            <div class="col-md-12" align="center">
                             <iframe width="200" height="120" src="https://www.youtube.com/embed/{{ $data->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                            </div>
                        </div>



                     </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>


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
