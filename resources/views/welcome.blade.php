@extends('layouts.front')

@section('banner')
    <div class="jumbotron">
        <div class="container">
            <h1>Forum Website</h1>
            <p>
                <a class="btn btn-primary btn-lg" href="{{route('thread.index')}}"">Ga naar de topics</a>
            <p>
        </div>
    </div>
@endsection
@section('heading',"Threads")
@section('content')

    @include('thread.partials.thread-list')


@endsection

