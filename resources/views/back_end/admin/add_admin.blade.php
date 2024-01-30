@extends('back_end.layouts.index')
@section('content')

    <div class="content-wrapper">


        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Admin User</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Admin User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>


        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row justify-content-center">

                    <div class="col-md-10">
                        <div class="card">

                            <div class="card-header">
                                <h3 class="card-title">Add Admin Information</h3>
                                <a href="{{ route('admin.view') }}" class="btn btn-primary btn-sm"  style="float:right;"><i class="fa fa-list"></i>&nbsp; View</a>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">

                                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data" id="myForm">
                                        @csrf

                                        <div class="row">

                                            <div class="form-group col-md-6 mt-2">
                                                <smail for="role">User Role</smail>
                                                <select name="role" class="form-control form-control-sm">
                                                    @foreach ($role as $data)
                                                        @if($data->name  !== 'Administrator')
                                                            <option value="{{ $data->name }}">{{ $data->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <font style="color:red">{{($errors->has('role'))?($errors->first('role')):'' }}</font>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <smail for="name">Name</smail>
                                                <input type="text" name="name" class="form-control form-control-sm" placeholder="Admin User Name">
                                                <font style="color:red">{{($errors->has('name'))?($errors->first('name')):'' }}</font>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <smail for="email">Email</smail>
                                                <input type="text" name="email" class="form-control form-control-sm" placeholder="example@app.com">
                                                <font style="color:red">{{($errors->has('email'))?($errors->first('email')):'' }}</font>
                                            </div>

                                            <div class="form-group col-md-6 mt-2">
                                                <smail for="status">Status</smail>
                                                <select name="status" class="form-control form-control-sm">
                                                <option value="">Select Role</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                                </select>
                                                <font style="color:red">{{($errors->has('status'))?($errors->first('status')):'' }}</font>
                                            </div>

                                            <div class="form-group col-md-6 mt-2">
                                                <smail for="password" class="form-label">Password</smail>
                                                <input type="password" class="form-control form-control-sm" name="password" placeholder="Password">
                                                <font style="color:red">{{($errors->has('password'))?($errors->first('password')):'' }}</font>
                                            </div>

                                            <div class="form-group col-md-6 mt-2">
                                                <smail for="retype_password" class="form-label">Confirm Password</smail>
                                                <input type="password" class="form-control form-control-sm" name="retype_password" placeholder="Retype Password">
                                                <font style="color:red">{{($errors->has('retype_password'))?($errors->first('retype_password')):'' }}</font>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>

                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </section>


    </div>

    <script>
    $(function (){
        $('#myForm').validate({
        rules: {
            role: {
                required: true,
            },
            name: {
                required: true,
            },
            email: {
            required: true,
            },
            status: {
                required: true,
            },
            password: {
                required: true,
            },
            retype_password: {
                required: true,
                equalTo : '#password'
            },
        },

        messages: {
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
        });
    });
    </script>

 @endsection
