@extends('layouts.app')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endpush
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        </br>
        <div class="row">
            <div class="col-md-3 ">
                <div class="media">
                    <div class="media-left media-middle">

                        <i class="fa fa-users fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>User</b></h4>
                        @if(isset($user))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.users.index')}}" class="btn btn-lg btn-block btn-danger">
                    <i class="fa fa-arrow-circle-left"></i>
                    Back
                </a>
            </div>

        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <form action="{{isset($user) ? route('app.users.update',$user->id) : route('app.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                <!-- TABLE: LATEST ORDERS -->
                <div class="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">User Info</div>
                                <div class="panel-body">
                                    <label for="name">Name</label>
                                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}" placeholder="Name" required >

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="email">Email</label>
                                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input type="email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}" placeholder="Email" required >

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="password">Password</label>
                                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input type="password" class="form-control" name="password" placeholder="Password"
                                               {{!isset($user)? 'required':''}}>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="password">Confirm Password</label>
                                    <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" {{!isset($user)? 'required':''}}>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <label for="phone">Phone</label>
                                    <div class="form-group has-feedback{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? old('phone') }}" placeholder="phone"  >

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="degree">Doctor degree</label>
                                    <div class="form-group has-feedback{{ $errors->has('degree') ? ' has-error' : '' }}">
                                        <input type="text" class="form-control" name="degree" value="{{ $user->degree ?? old('degree') }}" placeholder="degree"  >

                                        @if ($errors->has('degree'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('degree') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="description">Description</label>
                                    <div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <textarea type="text" class="form-control" name="description" placeholder="description" >{{ $user->description ?? old('description') }}</textarea>

                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Select Role and Status</div>
                                <div class="panel-body">
                                    <label for="role">Select Role</label>
                                    <div class="form-group has-feedback{{ $errors->has('role') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="role" required>
                                            <option></option>
                                            @foreach($roles as $key=> $role)
                                                <option value="{{$role->id}}" @isset($user){{$user->role->id ==$role->id ? 'selected':''}} @endisset>{{$role->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('role'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="role">Date of Birth</label>
                                    <div class="form-group has-feedback{{ $errors->has('dob') ? ' has-error' : '' }}">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" name="dob" value="{{ $user->dob ?? old('dob') }}" class="form-control pull-right" id="datepicker">
                                        </div>

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="avatar">Avatar</label>
                                    <div class="form-group has-feedback{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                        <input type="file" class="dropify form-control" name="avatar" data-default-file="{{isset($user) ? $user->getFirstMediaUrl('avatar') :'' }}" >

                                        @if ($errors->has('avatar'))
                                            <span class="text-danger">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="status">Status</label>
                                    <div class="form-group has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">
                                        <label class="switch">
                                            <input type="checkbox" name="status" id="status" @isset($user){{ $user->status ==true ? 'checked':'' }} @endisset>
                                            <span class="slider round"></span>
                                        </label>

                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-info btn-lg">
                                        @if(isset($user))
                                            <i class="fa fa-arrow-circle-up"></i>
                                            User Update
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            User Create
                                        @endif
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->


                </div>
                <!-- /.box -->
                </form>
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: "Select Role",
                allowClear: true
            });

            $('.dropify').dropify();

            $('#datepicker').datepicker();
        });

    </script>


@endpush
