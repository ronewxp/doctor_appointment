@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/cardAppointment.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <style>
        .card-details {
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px black;
            font-size: 18px;
        }

        /* span {
            font-size: 15px;
        } */

        .col-md-4 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile {
            border-right: 0.5px solid #80808059;
        }

        .name {
            display: grid;
        }
        .avatar{
            width: 450px;
            height: auto;
        }

        .img-fluid {
            border-radius: 26px;
            width: 60%;
            float: left;
        }

        .name h2 {
            margin-bottom: 0px;
        }

        .name span {
            display: block;
        }

        /* .userSection input {
            display: block;
            width: 100%;
            margin: 10px 0px;
        } */

        @media screen and (max-width: 900px) {
            .img-fluid {
                margin-bottom: 40px;
                padding: 10px;
            }
        }

        @media screen and (max-width: 460px) {
            .profile {
                border-right: 0px;
            }

            .col-md-4 {
                display: block;
            }

            .col-md-4:last-child {
                padding-top: 30px;
            }
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
                        <h4 class="media-heading"><b>Appointment</b></h4>
                        @if(isset($user))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('myAppointment')}}" class="btn btn-lg btn-block btn-danger">
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
                <form action="{{route('appointment.store')}}" method="POST">
                @csrf
                    <input type='text' name="doctor_id" value="{{ $doctors->id }}" style="display: none">
                    <input type='text' name="user_id" value="{{ $user->id }}" style="display: none">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img style="width: 250px" class="profile-user-img img-responsive img-rounded" src="{{$doctors->getFirstMediaUrl('avatar') != null ? $doctors->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="User profile picture">

                            <h3 class="profile-username text-center">{{$doctors->name}}</h3>

                            <p class="text-muted text-center">{{$doctors->email}}</p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Role</b> <a class="pull-right">
                                        @if($doctors->role)
                                            <span class="label label-success">{{$doctors->role->name}}</span>
                                        @else
                                            <span class="label label-danger">No Role Found</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Phone Number</b> <a class="pull-right">
                                        {{$doctors->phone}}
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Degree</b> <a class="pull-right">
                                        {{$doctors->degree}}
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Status</b> <a class="pull-right">
                                        @if($doctors->status)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">InActive</span>
                                        @endif
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Date of Birth</b> <a class="pull-right">{{\Carbon\Carbon::parse($doctors->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>specialists</b> <a class="pull-right">{{ $doctors->specialists }}</a>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Weight</b> <a class="pull-right">{{ $doctors->weight }} Kg</a>
                                    </a>
                                </li>

                                <li class="list-group-item">
                                    <b>Joined Date</b> <a class="pull-right">{{$doctors->created_at->diffForHumans()}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Update Information</b> <a class="pull-right">{{$doctors->updated_at->diffForHumans()}}</a>
                                </li>


                            </ul>


                        </div>
                        <!-- /.box-body -->
                    </div>
                            <label for="date">Appointment Date & Time :</label>
                            <div class="form-group has-feedback{{ $errors->has('date') ? ' has-error' : '' }}">

                                <div class="input-group date">
                                    <input type='text' placeholder="Please Input Date & Time" name="date" value=""
                                           class="form-control pull-right" id="CalendarDateTime">
                                </div>

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-info btn-lg">
                                @if(isset($user))
                                    <i class="fa fa-arrow-circle-up"></i>
                                    Appointment Update
                                @else
                                    <i class="fa fa-plus-circle"></i>
                                    Appointment Create
                                @endif
                            </button>

                        </div>
                    </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js">
    </script>


    <script type="text/javascript">
        $(function() {
            $('#CalendarDateTime').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
            });
        });


    </script>


@endpush
