@extends('layouts.app')
@push('css')
    <script src="{{asset('js/ckeditor.js')}}"></script>

<style>
    .ck-editor__editable {
        min-height: 150px;
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
                        <h4 class="media-heading"><b>Prescription</b></h4>
                        @if(isset($prescription))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                @role('admin')
                <a href="{{route('prescription.index')}}" class="btn btn-lg btn-block btn-danger">
                    <i class="fa fa-arrow-circle-left"></i>
                    Back
                </a>
                @endrole
            </div>

        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <form action="{{isset($prescription) ? route('prescription.update',$prescription->id) : route('prescription.store')}}" method="POST">
                @csrf
                @if(isset($prescription))
                    @method('PUT')
                @endif
                <!-- TABLE: LATEST ORDERS -->
                <div class="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Doctor Name: {{$doctors->name}}</div>
                                <div class="panel-body">

                                    <label for="examination">Examination</label>
                                    <div class="form-group has-feedback{{ $errors->has('examination') ? ' has-error' : '' }}">

                                        <textarea id="examination" name="examination" placeholder="Place some text here" >{{ $prescription->examination ?? old('examination') }}</textarea>

                                        @if ($errors->has('examination'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('examination') }}</strong>
                                        </span>
                                        @endif
                                    </div>



                                    <label for="lab_tests">Investigation / Lab-Tests</label>
                                    <div class="form-group has-feedback{{ $errors->has('lab_tests') ? ' has-error' : '' }}">
                                        <textarea id="lab_tests" name="lab_tests" placeholder="Place some text here">{{ $prescription->lab_tests ?? old('lab_tests') }}</textarea>

                                        @if ($errors->has('lab_tests'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('lab_tests') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label for="advice">Advice</label>
                                    <div class="form-group has-feedback{{ $errors->has('advice') ? ' has-error' : '' }}">
                                        <textarea id="advice" name="advice" placeholder="Place some text here">{{ $prescription->advice ?? old('advice') }}</textarea>

                                        @if ($errors->has('advice'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('advice') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Patient Name: {{$user->name}} || Dob: {{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}} || weight : {{$user->weight}}</div>
                                <div class="panel-body">
                                    <input type='text' name="doctor_id" value="{{ $doctors->id }}" style="display: none">
                                    <input type='text' name="user_id" value="{{ $user->id }}" style="display: none">
                                    <input type='date' name="date" value="{{ date("Y-m-d") }}" style="display: none">

                                    <label for="medicine">Medicine</label>
                                    <div class="form-group has-feedback{{ $errors->has('medicine') ? ' has-error' : '' }}">

                                        <textarea id="medicine" name="medicine" placeholder="Place some text here">{{ $prescription->medicine ?? old('medicine') }}</textarea>

                                        @if ($errors->has('medicine'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('medicine') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <button type="submit" class="btn btn-info btn-lg">
                                        @if(isset($prescription))
                                            <i class="fa fa-arrow-circle-up"></i>
                                            Prescription Update
                                        @else
                                            <i class="fa fa-plus-circle"></i>
                                            Prescription Create
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
    <script src="{{asset('js/ckeditorid.js')}}"></script>
    <script>


    </script>


@endpush
