{{--@extends('errors::minimal')--}}

{{--@section('title', __('Service Unavailable'))--}}
{{--@section('code', '503')--}}
{{--@section('message', __('Service Unavailable'))--}}

@extends('layouts.app')
@push('css')
    <style>
        .error-503 {
            margin: 0 auto;
            text-align: center;
        }
        .error-503 .error-code {
            bottom: 60%;
            color: #4686CC;
            font-size: 96px;
            line-height: 100px;
            font-weight: bold;
        }
        .error-503 .error-desc {
            font-size: 12px;
            color: #647788;
        }
        .error-503 .m-b-10 {
            margin-bottom: 10px!important;
        }
        .error-503 .m-b-20 {
            margin-bottom: 20px!important;
        }
        .error-503 .m-t-20 {
            margin-top: 0px;
        }
    </style>
@endpush
@section('content')
    <div class="error-503">
        <br>
        <br>
        <div class="error-code m-b-10 m-t-20">503 <i class="fa fa-warning"></i></div>
        <h2 class="font-bold">{{$exception->getMessage()}}</h2>

        <div class="error-desc">
            Sorry, but the page you are looking for was either not found or does not exist. <br/>
            Try refreshing the page or click the button below to go back to the Homepage.
        </div>
    </div>

@endsection
