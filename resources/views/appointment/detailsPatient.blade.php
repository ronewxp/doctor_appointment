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
                        Details
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('doctorAppointment')}}" class="btn btn-lg btn-block btn-danger">
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
                <form action="#" method="POST">
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
                                    <img src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}"
                                         class="img-fluid" alt="image">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 profile">
                                <div class="name">
                                    <h1><b>Patient</b></h1>
                                    <hr/>
                                    <h4><b>Name</b>: {{$user->name}}</h4>
                                    <h4><b>Weight</b>: {{$user->weight}}</h4>
                                    <h4><b>Specialists</b>: {{$user->specialists}}</h4>
                                    <h4><b>Age</b>:
                                        {{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}}
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
                                    <h4><b>Whatsapp Number</b>: {{$user->phone}}</h4>
                                    <h4><b>Email</b>: {{$user->email}}</h4>
                                    <button type="submit" class="btn btn-info btn-lg">
                                            <i class="fa fa-whatsapp"></i>
                                            Call
                                    </button>

                                    @can('prescription.create')
                                        <a href="{{route('prescription.show',$user->id)}}" class="btn btn-lg btn-success" target="_blank" >
                                            <i class="fa fa-plus"></i> Prescription
                                        </a>
                                    @endcan
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
