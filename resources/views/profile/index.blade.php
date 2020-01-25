@extends('layouts.front')

@section('category')
    <div class="col-md-3">
        <div class="dp">
{{--            profiel--}}
        </div>
        <h3>{{$user->name}}</h3>
    </div>

@endsection

@section('content')

    <div>
        <h3>{{$user->name}}</h3>

        @forelse($threads as$thread)
            <h5>{{$thread->subject}}</h5>

            @empty
        <h5>Geen threads</h5>

            @endforelse

        <h3>Reacties</h3>

        @forelse($comments as $comment)
            <h5>{{$user->name}} reageerde op {{$comment->commentable->subject}} {{$comment->created_at->diffForHumans()}}</h5>
            @empty
            <h5>Geen reacties</h5>
            @endforelse
    </div>

@endsection
