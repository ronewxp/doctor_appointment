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

                        <i class="fa fa-check-square-o fa-3x text-info"></i>

                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><b>Role</b></h4>
                        @if(isset($role))
                            Update
                        @else
                            Create
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-2 col-md-offset-7">
                <a href="{{route('app.roles.index')}}" class="btn btn-lg btn-block btn-primary">
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
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{isset($role) ? route('app.roles.update',$role->id) : route('app.roles.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($role))
                                @method('PUT')
                            @endif
                            <label for="name">Role Name</label>
                            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="name" value="{{ $role->name ?? old('name') }}" placeholder="Role Name" required >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="text-center">
                                <strong>Manage permissions for role</strong>
                                <hr>
                                @if ($errors->has('permissions'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('permissions') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="select-all">
                                    <label class="custom-control-label" for="select-all">Select All</label>
                                </div>
                            </div>
                            @forelse($modules->chunk(3) as $key=> $chunks)
                                <div class="row">
                                    @foreach($chunks as $key=> $module)
                                        <div class="col-md-3">
                                            <h4>Module : {{$module->name}}</h4>
                                            @foreach($module->permissions as $key=> $permission)
                                                <div class="">
                                                    <label>
                                                        <input type="checkbox"
                                                               id="permission-{{$permission->id}}"
                                                               name="permissions[]"
                                                               value="{{$permission->id}}"
                                                                @isset($role)
                                                                    @foreach($role->permissions as $rPermission)
                                                                        {{$permission->id == $rPermission->id ? 'checked':''}}
                                                                    @endforeach
                                                                @endisset
                                                        >
                                                        {{$permission->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            @empty
                                <div class="row">
                                    <div class="col text-center">
                                        <strong>No Module Found.</strong>
                                    </div>
                                </div>
                            @endforelse

                            <button type="submit" class="btn btn-block btn-info btn-lg">
                                @if(isset($role))
                                    <i class="fa fa-arrow-circle-up"></i>
                                    Role Update
                                @else
                                    <i class="fa fa-plus-circle"></i>
                                    Role Create
                                @endif
                            </button>

                        </form>


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
            $("#select-all").click(function() {
                $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
            });

            $("input[type=checkbox]").click(function() {
                if (!$(this).prop("checked")) {
                    $("#select-all").prop("checked", false);
                }
            });
        });

    </script>


@endpush
