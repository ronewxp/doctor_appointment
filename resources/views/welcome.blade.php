<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
</head>

<body>
    <!--navbar section start-->
    <nav class="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
            </div>
            <ul class="nav collapse navbar-collapse navbar-nav navbar-right" id="navbar">
                @if (Route::has('login'))
                @auth
                <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
                <li><a href="#">Page 2</a></li>
                @else
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                @endif
                @endauth

                @endif
            </ul>
        </div>
    </nav>
    <!--navbar section end-->

    <!--Card section start-->
    <section class="card-section">
        <div class="container">
            <div class="row">
                @foreach($doctors as $key=> $doctor )
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <img src="{{ $doctor->getFirstMediaUrl('avatar') != null ? $doctor->getFirstMediaUrl('avatar') : config('app.placeholder').'160.ping'}}"
                                class="img-fluid" alt="image">
                        </div>
                        <div class="card-body">
                            <h4>{{$doctor->name}}</h4>
                            <h5>{{$doctor->degree}}</h5>
                            <h5>Specialists</h5>
                            @if($doctor->status)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">InActive</span>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{route('appointment.show',$doctor->id)}}"
                                class="btn btn-primary rounded-pill">Appointment</a>
                            <a href="{{route('app.users.show',$doctor->id)}}"
                                class="btn btn-success rounded-pill">Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Card section end-->

    <!--Footer section start-->
    <footer>
        <div class="container">
            <div class="text-center">
                <span>copywright by <a href="#"> Doctor App</a></span>
            </div>
        </div>
    </footer>
    <!--Footer section end-->
</body>

</html>