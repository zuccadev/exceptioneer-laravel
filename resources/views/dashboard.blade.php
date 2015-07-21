@extends('layout')

@section('content')
    <ul>
        @foreach($projects as $p)
        <li><a href="{{ route('project', ['id' => $p->id]) }}">{{ $p->name }}</a></li>
        @endforeach
    </ul>
@endsection