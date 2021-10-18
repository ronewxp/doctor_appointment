<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/presscription.css') }}">

</head>
<body>
      <!--presscription section start-->
      <section class="presscription-section">
          <div class="container">
              <div class="title text-center">
                  <h1>Sonargaon University </h1>
                  <h3>www.su.edu.bd</h3>
              </div>
              <div class="doctor">
                  <h2>{{$prescription->getDoctor($prescription->doctor_id)->name}}</h2>
                  <h4>{{$prescription->getDoctor($prescription->doctor_id)->degree}}</h4>
              </div>
              <hr>
              <div class="patient">
                  <div class="name">
                    <span><b>Name</b>: {{$prescription->getUser($prescription->user_id)->name}}</span>
                    <span><b>Age</b>: {{\Carbon\Carbon::parse($prescription->getUser($prescription->user_id)->dob)->diff(\Carbon\Carbon::now())->format('%y years')}}</span>
                    <span><b>Sex</b>: Male</span>
                    <span><b>Weight</b>: {{$prescription->getUser($prescription->user_id)->weight}} kg</span>
                  </div>
                  <div class="date">
                      <span><b>Date</b>: {{$prescription->date}}</span>
                  </div>
              </div>
              <hr>
              <div class="row">
                  <div class="col-md-4 col-sm-4 report">
                      <div class="history">
                          <h2>On Examination</h2>
                          <span>{!! $prescription->examination !!}</span>
                      </div>
                      <br>
                      <div class="physicalFindings">
                          <h2>Investigation / Lab-Tests</h2>
                          <span>{!! $prescription->lab_tests !!}</span>
                      </div>
                      <br>
                      <div class="advice">
                        <h2>Advice</h2>
                        <span>{!! $prescription->advice !!}</span>
                      </div>
                  </div>
                  <div class="col-md-8 col-sm-8 medichine">
                      <div class="rx">
                          <h2>Rx</h2>
                          <h3>Medichine::</h3>
                          <ul list-style: none;>
                              <li>
                                  {!! $prescription->medicine !!}
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!--presscription section end-->

</body>
</html>
