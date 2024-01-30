@extends('back_end.layouts.index')
@section('content')

    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3> Admin User </h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Admin User </li>
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
                        <h3 class="card-title">Add</h3>
                        <a href="{{ route('admin.add') }}" class="btn btn-primary btn-sm"  style="float:right;"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th align="center">Status</th>
                                    <th align="center">Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($alldata as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td align="center">
                                            <img src="{{!empty($data->photo)?url('upload/admin/'.$data->photo):url('upload/no_image.png')}}" alt="" class="img-fluid" style="height:60px;" >
                                        </td>
                                        <td>{{ $data->role }}</td>


                                        <td align="center">

                                            @if($data->role == 'Administrator')
                                                <a href="#" class="btn btn-info btn-sm" disabled> Super Admin </a>
                                            @else
                                                @if($data->status=='0')
                                                    <a href="{{ route('admin.inactive',$data->id) }}" class="btn btn-primary btn-sm"> Publish </a>
                                                @else
                                                    <a href="{{ route('admin.active',$data->id) }}" class="btn btn-danger btn-sm"> Draft </a>
                                                @endif

                                            @endif


                                        </td>



                                        <td align="center">
                                            @if($data->role !== 'Administrator')
                                            <a title="Edit" href="{{ route('admin.edit',$data->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                            </a>
                                            <a title="Delete" href="{{route('admin.delete',$data->id)}}" id="delete" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @else
                                            <img src="{{ asset('upload/multiply.png') }}" alt="" class="img-fluid" style="height:30px;" >
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection
