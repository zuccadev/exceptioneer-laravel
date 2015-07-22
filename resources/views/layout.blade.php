<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('dashboard')}}">Exceptioneer</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">@if (isset($project)) {{$project->name}} @else Projects @endif<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($projects as $p)
                                    <li @if(isset($project) && ($p->id === $project->id)) class="disabled" @endif><a href="{{route('project', ['id' => $p->id])}}">{{$p->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="main-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @yield('content')
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onerror = function(error, url, line) {
        console.log(error, url, line);
    };

    throw new URIError;
    console.log(b);
</script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{url('js/scripts.js')}}"></script>
</body>
</html>