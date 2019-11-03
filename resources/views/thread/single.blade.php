@extends('layouts.front')

@section('content')

    <h4>{{$thread->subject}}</h4>
    <hr>

    <div class="thread-details">
        {{$thread->thread}}
    </div>

    <div class="actions">

        <a href="{{route('thread.edit',$thread->id)}}" class="btn btn-info btn-xs">Bewerken</a>

        <form action="{{route('thread.destroy',$thread->id)}}" method="POST" class="inline-it">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input class="btn btn-xs btn-danger" type="submit" value="Verwijderen">
        </form>

    </div>

@endsection
