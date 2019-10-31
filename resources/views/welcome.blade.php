@extends('layouts.front')

@section('banner')
    <br>
    <div class="jumbotron">
        <div class="container">
            <h1>Forum Website</h1>
            <p>
                <a class="btn btn-primary btn-lg">Ga naar de topics</a>
            <p>
        </div>
    </div>
@endsection

@section('content')

    @include('threads.partials.thread-list')


@endsection

