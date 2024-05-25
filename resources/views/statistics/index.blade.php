@extends('adminlte::page')

@section('title', trans('statistics.title'))

@section('content_header')
    <h1>{{ trans('statistics.title') }}</h1>
@stop

@section('content')
    @include('flash')
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="w-5">#</th>
                <th class="w-40">{{ trans('statistics.table.user') }}</th>
                <th>{{ trans('statistics.table.tasks_count') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->user->name }}</td>
                    <td>{{ $row->total_tasks }}</td>
            @endforeach
        </tbody>
    </table>
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
