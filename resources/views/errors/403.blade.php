{{--@extends('errors::minimal')--}}

{{--@section('title', __('Forbidden'))--}}
{{--@section('code', '403')--}}
{{--@section('message', __($exception->getMessage() ?: 'Forbidden'))--}}

@extends('layouts.app')
@push('css')
    <style>
    .error-403 {
    margin: 0 auto;
    text-align: center;
    }
    .error-403 .error-code {
    bottom: 60%;
    color: #4686CC;
    font-size: 96px;
    line-height: 100px;
    font-weight: bold;
    }
    .error-403 .error-desc {
    font-size: 12px;
    color: #647788;
    }
    .error-403 .m-b-10 {
    margin-bottom: 10px!important;
    }
    .error-403 .m-b-20 {
    margin-bottom: 20px!important;
    }
    .error-403 .m-t-20 {
    margin-top: 0px;
    }
    </style>
@endpush
@section('content')
    <div class="error-403">
        <br>
        <br>
        <div class="error-code m-b-10 m-t-20">403 <i class="fa fa-warning"></i></div>
        <h2 class="font-bold">{{$exception->getMessage()}}</h2>

        <div class="error-desc">
            Sorry, but the page you are looking for was either not found or does not exist. <br/>
            Try refreshing the page or click the button below to go back to the Homepage.
        </div>
    </div>

@endsection
