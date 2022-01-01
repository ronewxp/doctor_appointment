@extends('layouts.app')
@push('css')

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

                        <i class="fa fa-user fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>User</b></h4>
                        Details
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img style="width: 250px" class="profile-user-img img-responsive img-rounded" src="{{$user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center">{{$user->email}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Role</b> <a class="pull-right">
                                    @if($user->role)
                                        <span class="label label-success">{{$user->role->name}}</span>
                                    @else
                                        <span class="label label-danger">No Role Found</span>
                                    @endif
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Phone Number</b> <a class="pull-right">
                                    {{$user->phone}}
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Degree</b> <a class="pull-right">
                                    {{$user->degree}}
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right">
                                    @if($user->status)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">InActive</span>
                                    @endif
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Date of Birth</b> <a class="pull-right">{{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format('%y years old')}}</a>
                            </li>

                            <li class="list-group-item">
                                <b>specialists</b> <a class="pull-right">{{ $user->specialists }}</a>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Weight</b> <a class="pull-right">{{ $user->weight }} Kg</a>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <b>Joined Date</b> <a class="pull-right">{{$user->created_at->diffForHumans()}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Update Information</b> <a class="pull-right">{{$user->updated_at->diffForHumans()}}</a>
                            </li>


                        </ul>
                        <a href="{{route('doctorAppointment')}}" class="btn btn-lg btn-danger">
                            <i class="fa fa-arrow-circle-left"></i>
                            Back
                        </a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->


            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')

    <script>


    </script>


@endpush
