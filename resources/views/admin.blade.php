

@extends('layouts.front')

@section('category')
    <div class="col-md-3">
        <div class="dp">
{{--            profiel--}}
        </div>
    </div>

@endsection

@section('content')
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    </head>
    <div class="container">
        <admin-button></admin-button>
        <h1>Gebruikers</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Admin</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                               data-offstyle="danger" data-toggle="toggle" data-on="Admin" data-off="Normaal"
                            {{ $user->type=="admin" ? 'checked' : '' }}>

                            <admin-button></admin-button>
                        <example-component></example-component>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var type = $(this).prop('checked') == true ? 'admin' : 'default';
                var user_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {'type': type, 'id': user_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>






@endsection
