@extends('layouts.front')

@section('content')

    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">
        {{$thread->thread}}
    </div>
    <br>

    @if(auth()->user()->id==$thread->user_id or auth()->user()->type=='admin')
{{--        @if()--}}
{{--            @endif--}}

    <div class="actions">

        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Bewerken</a>

        <form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Verwijderen">
        </form>

    </div>
    @endif

    <div class="comment-list">

        @foreach($thread->comments as $comment)

            <h4>{{$comment->body}}</h4>
            <lead>{{$comment->user->name}}</lead>
            <div class="actions">
                @if(auth()->user()->id==$comment->user_id or auth()->user()->type=='admin')
{{--                <a href="{{route('comment.edit',$comment->id)}}" class="btn btn-info btn-xs">Bewerken</a>--}}
                <form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input class="btn btn-xs btn-danger" type="submit" value="Verwijderen">
                </form>
                    @endif

        </div>
        @endforeach

    </div>
    <div class="comment-form">
        <div class="comment-form">

            <form action="{{route('threadcomment.store',$thread->id)}}" method="post" role="form">
                {{csrf_field()}}
                <legend>Reageer</legend>

                <div class="form-group">
                    <input type="text" class="form-control" name="body" id="" placeholder="Input...">
                </div>


                <button type="submit" class="btn btn-primary">Reageer</button>
            </form>

        </div>
    </div>
@endsection
