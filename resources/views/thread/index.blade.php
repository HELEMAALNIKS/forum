@extends('layouts.front')

@section('heading')



    <div class="container">
        <div class="row">
            <div class="col-xs-6" style="margin-right: 16px">
                <a class="btn btn-primary float-md-right" href="{{route('thread.create')}}">Creeër thread</a> <br>
            </div>
            <div class="col-xs-6" style="margin-right: 16px">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Zoeken">
                        <a class="btn btn-primary float-md-right" style="margin-left:16px" href="{{route('thread.create')}}">Zoeken/Filteren</a>
                    </div>
                </form>
            </div>
        </div>
    </div>





@endsection

@section('content')

    <h2>Threads</h2>

    @include('thread.partials.thread-list')

@endsection
