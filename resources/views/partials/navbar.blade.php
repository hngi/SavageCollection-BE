<nav id="nav" class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand logo" href="{{ url('/') }}">SC</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#savageCollections" aria-controls="savageCollections" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="savageCollections">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}#nav">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}#how">How It Works</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}#collections">Savages</a>
            </li>
        </ul>
        @if (Route::has('login'))
            @auth
                <a class="btn btn-lg action-2 px-5 my-2 my-sm-0" href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a class="btn btn-lg px-5 text-white my-2 my-sm-0" href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a class="btn btn-lg action-2 px-5 my-2 my-sm-0" href="{{ route('register') }}">Sign Up</a>
                @endif
            @endauth
        @endif
    </div>
</nav>
