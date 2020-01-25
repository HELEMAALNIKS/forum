@extends('layouts.front')

@section('category')
    <div class="col-md-3">
        <div class="dp">
            {{--            profiel--}}
        </div>
{{--        <h3>{{$user->name}}</h3>--}}
    </div>

@endsection

@section('content')

    @if (count($errors) > 0)
        <div class=" alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--   nog testen--}}

<div class="row">
    <div class=" well">
    <form method="post" class="form-vertical" action="{{route('users.update', $user)}}">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <div class="form-group">
            <label for="subject">Naam:</label>
            <input type="text" class="form-control" name="name"  value="{{ $user->name }}" />
        </div>

        <div class="form-group">
            <label for="subject">Email:</label>
            <input type="email" class="form-control" name="email"  value="{{ $user->email }}" />
        </div>

        <div class="form-group">
            <label for="subject">Wachtwoord:</label>
            <input type="password" class="form-control" name="password" />
        </div>

        <div class="form-group">
            <label for="subject">Wachtwoord bevestiging:</label>
            <input type="password" class="form-control" name="password_confirmation" />
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    </div>
</div>

{{--<div class="row">--}}
{{--    <div class=" well">--}}
{{--        <form class="form-vertical" action="{{route('thread.update',$thread->id)}}">--}}
{{--            {{csrf_field()}}--}}
{{--            {{method_field('put')}}--}}
{{--            <div class="form-group">--}}
{{--                <label for="subject">Subject</label>--}}
{{--                <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{$thread->subject}}">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="type">Type</label>--}}
{{--                <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{$thread->type}}">--}}
{{--            </div>--}}

{{--            <div class="form-group">--}}
{{--                <label for="thread">Thread</label>--}}
{{--                <textarea class="form-control" name="thread" id="" placeholder="Input..."> {{$thread->thread}} </textarea>--}}
{{--            </div>--}}

{{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection
