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
                <a href="{{route('appointment.index')}}" class="btn btn-lg btn-block btn-danger">
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
                {{--                @if(isset($user))--}}
                {{--                    @method('PUT')--}}
                {{--                @endif--}}
                <!-- TABLE: LATEST ORDERS -->
                    <div class="">
                        <div class="row card-details">
                            <div class="col-md-4 col-sm-12">
                                <input type='text' name="doctor_id" value="{{ $doctors->id }}" style="display: none">
                                <div class="avatar">
                                    <img src="{{ $doctors->getFirstMediaUrl('avatar') != null ? $doctors->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}"
                                         class="img-fluid" alt="image">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 profile">
                                <div class="name">
                                    <h1><b>Doctor</b></h1>
                                    <hr/>
                                    <h4><b>Name</b>: {{$doctors->name}}</h4>
                                    <h4><b>Degree</b>: {{$doctors->degree}}</h4>
                                    <h4><b>Specialists</b>: {{$doctors->specialists}}</h4>
                                    <h4><b>Age</b>:
                                        {{\Carbon\Carbon::parse($doctors->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}}
                                    </h4>
                                    @if($doctors->status)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">InActive</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <input type='text' name="user_id" value="{{ $user->id }}" style="display: none">
                                <div class="userSection">
                                    <h4><b>Name</b>: {{$user->name}}</h4>
                                    <h4><b>Age</b>:
                                        {{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}}
                                    </h4>

                                    <br/>
                                    <br/>
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
