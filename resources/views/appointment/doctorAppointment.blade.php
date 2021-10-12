@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
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
                        Management
                    </div>
                </div>
            </div>
            @can('appointment.create')
            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('appointment.create')}}" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-plus-circle"></i>
                    Appointment Create
                </a>
            </div>
            @endcan
        </div>
        <!-- /.row -->
        </br>
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table no-margin">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient</th>
                                    <th class="text-center">Appointment Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($appointment as $kye=> $appointments)
                                    <tr>
                                        <td >{{$kye + 1}}</td>

                                        <td >
                                            <a href="{{route('app.users.show',$appointments->user_id)}}">
                                                <h5 class="media-heading">{{$appointments->getUser($appointments->user_id)}}</h5>
                                            </a>
                                        </td>

                                        <td  class="text-center">{{$appointments->date}} </td>

                                        <td  class="text-center">
                                            @can('app.roles.index')
                                                <a href="" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-eye"></i> Show
                                                </a>
                                            @endcan
                                            @can('app.roles.edit')
                                                <a href="" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            @endcan

                                            @can('app.users.destroy')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData()">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            @endcan
                                                <form id="delete-form-" method="POST" action="" style="display: none">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
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
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );

    </script>


@endpush
