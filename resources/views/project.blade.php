@extends('layout')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <h4>12345 errors</h4>
            <h6>STAGE</h6>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="?stage=production">Production</a></li>
                <li><a href="?stage=staging">Staging</a></li>
            </ul>
        </div>
        <div class="col-sm-9">
            <table class="table table-hover">
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
                                <?php $className = explode('\\', $notification->exception_class); ?>
                                <strong>{{end($className)}}</strong> {{$notification->method}} {{$notification->path}}
                                <br>{{$notification->message ? $notification->message : 'no message'}}
                                <br>{{\Carbon\Carbon::parse($notification->first)->diffForHumans()}} - {{\Carbon\Carbon::parse($notification->last)->diffForHumans()}}
                            </div>
                        </td>
                        <td>{{$notification->occurencies}}</td>
                        <td>{{$notification->time}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection