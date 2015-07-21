@extends('layout')

@section('content')
    <h1>{{$project->name}}</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Code</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        @foreach($project->notifications as $notification)
            <tr>
                <td>{{$notification->code}}</td>
                <td>{{$notification->message}}</td>
                <td>{{$notification->time}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection