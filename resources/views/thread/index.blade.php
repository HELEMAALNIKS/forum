@extends('layouts.front')

@section('heading')

    <a class="btn btn-primary float-md-right" href="{{route('thread.create')}}">Creeër thread</a> <br>

@endsection

@section('content')

    <h2>Threads</h2>

    @include('thread.partials.thread-list')

@endsection
