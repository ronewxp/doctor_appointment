<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
        <link href="{{ asset('css/card.css') }}" rel="stylesheet">

    </head>
    <body>
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}" class="">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container">
                <div class="row">
                    @foreach($doctors as $key=> $doctor )
                        <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ $doctor->getFirstMediaUrl('avatar') != null ? $doctor->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}" alt="Avatar">
                            <div class="container">
                                <b>{{$doctor->name}}</b>

                                <p>{{$doctor->degree}}</p>

                                <p>Specialists</p>

                                <p>
                                    @if($doctor->status)
                                        <span class="label label-success">Active</span>
                                    @else
                                        <span class="label label-danger">InActive</span>
                                    @endif

                                </p>
                                <p><a href="{{route('appointment.show',$doctor->id)}}" class="btn btn-primary" role="button">Appointment</a> <a href="{{route('app.users.show',$doctor->id)}}" class="btn btn-default" role="button">View Profile</a></p>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


            <!-- jQuery 3.1.1 -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
            <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>
    </body>
</html>
