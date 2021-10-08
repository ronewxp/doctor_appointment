@extends('layouts.app')
@push('css')
    <link href="{{ asset('css/card.css') }}" rel="stylesheet">

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
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Doctor Information</div>
                                <div class="panel-body">

                                    <input type='text' name="doctor_id" value="{{ $doctors->id }}" style="display: none">
                                    <div>
                                        <img class="card-img-top" src="{{ $doctors->getFirstMediaUrl('avatar') != null ? $doctors->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="Avatar">

                                        <h4><b>{{$doctors->name}}</b></h4>

                                        <p>{{$doctors->degree}}</p>

                                        <p>Specialists</p>

                                        <p>
                                            @if($doctors->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">My Information</div>
                                <div class="panel-body">

                                    <input type='text' name="user_id" value="{{ $user->id }}" style="display: none">
                                            <img class="card-img-top" src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="Avatar">

                                            <h4><b>{{$user->name}}</b></h4>

                                            <p>{{$user->degree}}</p>

                                            <p>
                                                @if($user->status)
                                                    <span class="label label-success">Active</span>
                                                @else
                                                    <span class="label label-danger">InActive</span>
                                                @endif

                                            </p>


                                            <label for="date">Appointment Date & Time</label>
                                            <div class="form-group has-feedback{{ $errors->has('date') ? ' has-error' : '' }}">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type='text' name="date" value="{{ $user->dob ?? old('date') }}" class="form-control pull-right" id="datepicker">
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

    <script>
        $(document).ready(function() {
            $('#datepicker').datetimepicker();
        });

    </script>


@endpush
