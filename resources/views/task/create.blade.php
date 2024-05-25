@extends('adminlte::page')

@section('title', trans('task.create.title'))

@section('content_header')
    <h1>{{ trans('task.create.title') }}</h1>
@stop

@section('content')
    @include('flash')
    @include('task.form')
@stop

@section('css')
    <style>
        .w-5 {
            width: 5% !important;
        }

        .w-10 {
            width: 10% !important;
        }

        .w-25 {
            width: 25% !important;
        }

        .w-30 {
            width: 30% !important;
        }

        .w-40 {
            width: 40% !important;
        }
    </style>
@stop

@section('js')
@stop
