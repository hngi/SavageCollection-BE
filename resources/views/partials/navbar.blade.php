<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top shadow-lg px-5 py-3">
        <!-- Brand -->
        <a class="navbar-brand text-uppercase" id="logo" href="{{ url('/') }}">SC</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-light" href="{{ url('/') }}">home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase text-light" href="{{ url('/all') }}">All Savages</a>
                </li>
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-uppercase text-light" href="{{ route('login') }}">Login</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-uppercase text-light" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
</header>
