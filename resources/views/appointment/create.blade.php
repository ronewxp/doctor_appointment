@extends('layouts.app')
@push('css')
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
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
                        @if(isset($appointment))
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
                <form action="{{isset($appointment) ? route('appointment.update',$appointment->id) : route('appointment.store')}}" method="POST">
                @csrf
                @if(isset($appointment))
                    @method('PUT')
                @endif
                <!-- TABLE: LATEST ORDERS -->
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Appointment</div>
                                <div class="panel-body">
                                    <label for="doctor">Doctor</label>
                                    <div class="form-group has-feedback{{ $errors->has('doctor') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="doctor_id" required>
                                            <option>--Select Doctor--</option>
                                            @foreach($doctors as $key=> $doctor)
                                                <option value="{{$doctor->id}}" @isset($appointment){{$doctor->id ? 'selected':''}} @endisset>{{$doctor->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('doctor'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('doctor') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="patient">Patient</label>
                                    <div class="form-group has-feedback{{ $errors->has('patient') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="user_id" required>
                                            <option>--Select Patient--</option>
                                            @foreach($users as $key=> $user)
                                                <option value="{{$user->id}}" @isset($appointment){{$user->id ? 'selected':''}} @endisset>{{$user->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('patient'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('patient') }}</strong>
                                        </span>
                                        @endif
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

                                    <label for="patient">Status</label>
                                    <div class="form-group has-feedback{{ $errors->has('patient') ? ' has-error' : '' }}">
                                        <select class="js-example-basic-single form-control" name="status" required>
                                            <option>--Select Status--</option>
                                                <option value="processing" @isset($appointment){{$appointment->status =='processing' ? 'selected':''}} @endisset>Processing</option>
                                                <option value="running" @isset($appointment){{$appointment->status =='running' ? 'selected':''}} @endisset>Running</option>
                                                <option value="complete" @isset($appointment){{$appointment->status =='complete' ? 'selected':''}} @endisset>Complete</option>
                                        </select>

                                        @if ($errors->has('status'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('status') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-info btn-lg">
                                        @if(isset($appointment))
                                            <i class="fa fa-arrow-circle-up"></i>
                                            appointment Update
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            appointment Create
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
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" ></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>


    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2({
        //         placeholder: "Select",
        //         allowClear: true
        //     });
        //
        //     $('.dropify').dropify();
        //
        // });
        $(function() {
            $('#CalendarDateTime').datetimepicker({
                format: 'YYYY-MM-DD HH:mm',
            });
        });


    </script>


@endpush
