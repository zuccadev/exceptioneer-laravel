@extends('layout')

@section('content')
    <h1>{{$project->name}}</h1>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Error</th>
            <th>Occurencies</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notification)
            <tr>
                <td>
                    <div>
                        <strong>{{$notification->exception_class}}</strong> {{$notification->method}} {{$notification->path}}
                        <br>{{$notification->message}}
                        <br>{{\Carbon\Carbon::parse($notification->first)->diffForHumans()}} - {{\Carbon\Carbon::parse($notification->last)->diffForHumans()}}
                    </div>
                </td>
                <td>{{$notification->occurencies}}</td>
                <td>{{$notification->time}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection