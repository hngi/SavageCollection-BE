<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Savage Collector</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_toggler" aria-controls="nav_toggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav_toggler">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/all_post') }}">All Savage</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
