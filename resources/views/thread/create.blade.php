@extends('layouts.front')

@section('heading', "Creeër Thread")

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

    @if (session('message'))
        <div class="alert alert-succes">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="well">
            <form class="form-vertical" action="{{route('thread.store')}}" method="post" role="form" id="create-thread-form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" name="subject" id="" placeholder="Input..." value="{{old('subject')}}">
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="" placeholder="Input..." value="{{old('type')}}">
                </div>

                <div class="form-group">
                    <label for="thread">Thread</label>
                    <textarea class="form-control" name="thread" id="" placeholder="Input..." value="{{old('thread')}}"></textarea>
                </div>

                {{--  <div class="form-group">
                   {!! app('captcha')->display() !!}
                </div>  --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
