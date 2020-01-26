<div class="col-md-3">
    <h4>Categorie</h4>
    <div class="list-group">
        <a href="{{ url('/') }}"
           class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
            Home
        </a>
        <a href="{{route('thread.index')}}"
           class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
            Threads
        </a>
        @guest

        @else
                <a href="http://localhost:8080/forum/public/users/1"
                class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                Gegevens bewerken
                </a>
            @if(auth()->user()->type=='admin')
                <a href="http://localhost:8080/forum/public/adminpanel"
                   class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">
                    Admin paneel
                </a>
            @endif
        @endguest





{{--        <a href="{{route('user.profile.index')}}"--}}
{{--           class="list-group-item d-flex justify-content-between align-items-center list-group-item-action">--}}
{{--            User--}}
{{--        </a>--}}
    </div>

<br>
</div>

