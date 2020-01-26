@extends('layouts.front')

@section('heading')



    <div class="container">
        <div class="row">


{{--            DIEPERE VALIDATIE \o/--}}
            @inject('comment', 'App\Comment')
            @if($comment->where('user_id','=', auth()->user()->id)->count() > 2)
                <div class="col-xs-6" style="margin-right: 16px">
                    <a class="btn btn-primary float-md-right" href="{{route('thread.create')}}">Creeër thread</a> <br>
                </div>
            @endif


            <div class="col-xs-6" style="margin-right: 16px">
                <form action="/search" method="get">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Zoeken">
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Zoeken</button>
                        </span>
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
