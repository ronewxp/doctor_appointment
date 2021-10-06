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
                        <h4 class="media-heading"><b>Backup</b></h4>
                        Management
                    </div>
                </div>
            </div>
            @can('app.backup.create')
            <div class="col-md-4 col-md-offset-5">
                <div class="row">
                    <div class="col-md-6">
                <button onclick="event.preventDefault();
                          document.getElementById('new-backup-form').submit();"
                        class="btn btn-block btn-info btn-lg">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus-circle"></i>
                        </span>
                    {{ __('Create New Backup') }}
                </button>
                <form id="new-backup-form" action="{{ route('app.backups.store') }}" method="POST" style="display: none;">
                    @csrf

                </form>
                    </div>
                    <div class="col-md-6">
                        <button onclick="event.preventDefault();
                                  document.getElementById('clean-old-backups').submit();"
                                class="btn-shadow btn btn-danger btn-lg">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-trash fa-w-20"></i>
                                </span>
                            {{ __('Clean Old Backups') }}
                        </button>
                        <form id="clean-old-backups" action="{{ route('app.backups.clean') }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
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
                                    <th class="text-center">#</th>
                                    <th class="text-center">File Name</th>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($backups as $key=>$backup)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $key + 1 }}</td>
                                        <td class="text-center">
                                            <code>{{ $backup['file_name'] }}</code>
                                        </td>
                                        <td class="text-center">{{ $backup['file_size'] }}</td>
                                        <td class="text-center">{{ $backup['created_at'] }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-sm" href="{{ route('app.backups.download',$backup['file_name']) }}"><i
                                                    class="fa fa-download"></i>
                                                <span>Download</span>
                                            </a>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="deleteData({{ $key }})">
                                                <i class="fa fa-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                            <form id="delete-form-{{ $key }}"
                                                  action="{{ route('app.backups.destroy',$backup['file_name']) }}" method="POST"
                                                  style="display: none;">
                                                @csrf()
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
