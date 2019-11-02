<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.min.css">
</head>
<body>
@include('layouts.partials.navbar')

@yield('banner')
<div class="container">
    <div class="row justify-content-between">
{{--        <div class="row">--}}
            <div class="col-md-3"><h4>Categorie</h4></div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4"><h4 class="main-content-heading">@yield('heading')</h4></div>
                </div>
                <div class="col-md-offset 6col-md-2">
                    <a class="btn btn-primary" href="{{route('thread.create')}}">Creeër thread</a>
                </div>
{{--            </div>--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{route('thread.index')}}"
                   class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">10</span>
                </a>
                <a href="{{route('thread.index')}}"
                   class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">5</span>
                </a>
                <a href="{{route('thread.index')}}"
                   class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">1</span>
                </a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="content-wrap well">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
