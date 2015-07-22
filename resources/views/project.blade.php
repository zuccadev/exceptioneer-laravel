@extends('layout')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <h4 class="total-errors">{{$notificationsCount}} total errors</h4>
            @if (count($stages)>1)
            <h6>STAGE</h6>
            <ul class="nav nav-pills nav-stacked">
                @foreach($stages as $s)
                <li @if($currentStage === $s->stage) class="active" @endif><a href="?stage={{$s->stage}}">{{$s->stage}}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="col-sm-9">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Error</th>
                    <th>Occurencies</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                    <tr>
                        <td>
                            <div>
                                <?php $className = explode('\\', $notification->exception_class); ?>
                                <strong>{{end($className)}}</strong>&nbsp;&nbsp;&nbsp;{{$notification->method}}&nbsp;&nbsp;&nbsp;{{$notification->path}}
                                <br>{{$notification->message ? $notification->message : 'no message'}}
                                <br>{{\Carbon\Carbon::parse($notification->first)->diffForHumans()}} - {{\Carbon\Carbon::parse($notification->last)->diffForHumans()}}
                            </div>
                        </td>
                        <td>{{$notification->occurencies}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $notifications->appends(['stage' => $currentStage])->render() !!}
        </div>
    </div>
@endsection