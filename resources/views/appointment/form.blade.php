@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/cardAppointment.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
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
                <form action="{{route('appointment.store')}}" method="POST" >
                @csrf
{{--                @if(isset($user))--}}
{{--                    @method('PUT')--}}
{{--                @endif--}}
                <!-- TABLE: LATEST ORDERS -->
                <div class="">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Doctor Information</div>
                                <div class="panel-body">

                                    <input type='text' name="doctor_id" value="{{ $doctors->id }}" style="display: none">

                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ $doctors->getFirstMediaUrl('avatar') != null ? $doctors->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" class="img-fluid" alt="image">
                                        </div>
                                        <div class="card-body">
                                            <h2>{{$doctors->name}}</h2>
                                            <h3>{{$doctors->degree}}</h3>
                                            <h4>{{$doctors->specialists}}</h4>
                                            @if($doctors->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">My Information</div>
                                <div class="panel-body">

                                    <input type='text' name="user_id" value="{{ $user->id }}" style="display: none">

                                    <div class="card">
                                        <div class="card-header">
                                            <img src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" class="img-fluid" alt="image">
                                        </div>
                                        <div class="card-body">
                                            <h2>{{$user->name}}</h2>
                                            <h3>{{$user->degree}}</h3>
                                            <h4>{{$user->specialists}}</h4>
                                            @if($user->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif
                                        </div>

                                    </div>


                                            <label for="date">Appointment Date & Time</label>
                                            <div class="form-group has-feedback{{ $errors->has('date') ? ' has-error' : '' }}">

                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type='text' name="date" value="" class="form-control pull-right" id="CalendarDateTime">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript">

        $(function() {
            $('#CalendarDateTime').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
            });
        });


    </script>


@endpush
