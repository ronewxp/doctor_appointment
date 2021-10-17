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
                        <h4 class="media-heading"><b>Users</b></h4>
                        Management
                    </div>
                </div>
            </div>
            @can('app.users.create')
            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.users.create')}}" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-plus-circle"></i>
                    User Create
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
                                    <th>Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Joined at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $kye=> $user)
                                    <tr>
                                        <td > {{$kye + 1}}</td>
                                        <td >
                                            <div style="width: 220px"  class="media">
                                                <div class="media-left media-middle">
                                                    <img width="40" height="40" class="img-circle" src="{{ $user->getFirstMediaUrl('avatar') != null ? $user->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="Avatar User">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">{{$user->name}}</h5>
                                                    @if($user->role)
                                                        <span class="label label-success">{{$user->role->name}}</span>
                                                    @else
                                                        <span class="label label-danger">No Role Found</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center">{{$user->email}}</td>

                                        <td  class="text-center">
                                            @if($user->status)
                                                <span class="label label-success">Active</span>
                                            @else
                                                <span class="label label-danger">InActive</span>
                                            @endif
                                        </td>

                                        <td  class="text-center">{{$user->created_at->diffForHumans()}} </td>
                                        <td  class="text-center">
                                            @can('app.roles.index')
                                                <a href="{{route('app.users.show',$user->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-eye"></i> Show
                                                </a>
                                            @endcan
                                            @can('app.roles.edit')
                                                <a href="{{route('app.users.edit',$user->id)}}" class="btn btn-sm btn-info" >
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            @endcan

                                            @can('app.users.destroy')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{$user->id}})">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            @endcan
                                                <form id="delete-form-{{$user->id}}" method="POST" action="{{route('app.users.destroy',$user->id)}}" style="display: none">
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
