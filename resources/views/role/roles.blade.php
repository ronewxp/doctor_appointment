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

                        <i class="fa fa-list fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>Role</b></h4>
                        Management
                    </div>
                </div>
            </div>
            @can('app.roles.create')
            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.roles.create')}}" class="btn btn-block btn-info btn-lg">
                    <i class="fa fa-plus-circle"></i>
                    Role Create
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
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Permission</th>
                                    <th class="text-center">updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $kye=> $role)
                                    <tr>
                                        <td> # {{$kye + 1}}</td>
                                        <td class="text-center">{{$role->name}}</td>
                                        @if($role->permissions->count() > 0)
                                            <td class="text-center"><span class="label label-success">Permissions {{$role->permissions->count()}}</span></td>
                                        @else
                                            <td class="text-center"><span class="label label-danger">No Permission Found</span></td>
                                        @endif
                                        <td class="text-center">{{$role->updated_at->diffForHumans()}} </td>
                                        <td class="text-center">
                                            @can('app.roles.edit')
                                                <a href="{{route('app.roles.edit',$role->id)}}" class="btn btn-sm btn-info" >
                                                <i class="fa fa-edit"></i> Edit
                                            @endcan
                                            </a>
                                            @if($role->deletable == true)
                                            @can('app.roles.destroy')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{$role->id}})">
                                                    <i class="fa fa-trash-o"></i> Delete
                                                </button>
                                            @endcan
                                                <form id="delete-form-{{$role->id}}" method="POST" action="{{route('app.roles.destroy',$role->id)}}" style="display: none">
                                                    @csrf
                                                    @method('DELETE')

                                                </form>
                                            @endif
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
