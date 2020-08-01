<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    <body>

        @include('partials.navbar')

        <section id="login">
            <div class="row">
                <div class="col-lg-5 logo d-flex align-items-center justify-content-center text-center">
                    <div>
                        <a href="{{ url('/')}}" class="brand">
                            SC
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <a href="{{ url('/')}}">Go back to home</a>
                    </div>
                </div>
                <div class="col-lg-7 form">
                    @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="form-signin">
                        <div class="text-center mb-5">
                            <h4>Login to your account</h4>
                            <p>Don't have an account? <a href="{{ url('/register')}}">Sign Up Free!</a></p>
                        </div>
                        @csrf
                        <div class="form-label-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required />
                        </div>
                        <div class="form-label-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                        </div>
                        <button type="submit" class="mt-3 btn btn-lg btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </section>

        @include('partials.footer')

    </body>
</html>
