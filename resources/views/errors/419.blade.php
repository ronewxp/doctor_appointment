{{--@extends('errors::minimal')--}}

{{--@section('title', __('Page Expired'))--}}
{{--@section('code', '419')--}}
{{--@section('message', __('Page Expired'))--}}

@extends('layouts.app')
@push('css')
    <style>
        .error-419 {
            margin: 0 auto;
            text-align: center;
        }
        .error-419 .error-code {
            bottom: 60%;
            color: #4686CC;
            font-size: 96px;
            line-height: 100px;
            font-weight: bold;
        }
        .error-419 .error-desc {
            font-size: 12px;
            color: #647788;
        }
        .error-419 .m-b-10 {
            margin-bottom: 10px!important;
        }
        .error-419 .m-b-20 {
            margin-bottom: 20px!important;
        }
        .error-419 .m-t-20 {
            margin-top: 0px;
        }
    </style>
@endpush
@section('content')
    <div class="error-419">
        <br>
        <br>
        <div class="error-code m-b-10 m-t-20">419 <i class="fa fa-warning"></i></div>
        <h2 class="font-bold">{{$exception->getMessage()}}</h2>

        <div class="error-desc">
            Sorry, but the page you are looking for was either not found or does not exist. <br/>
            Try refreshing the page or click the button below to go back to the Homepage.
        </div>
    </div>

@endsection
