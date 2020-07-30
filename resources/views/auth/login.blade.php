<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    @include('partials.style')

    <body>

        @include('partials.navbar')

        <div class="min_wrap">

            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>
                                @if ($errors->all())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}" class="form-signin">
                                    @csrf
                                    <div class="form-label-group">
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required />
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required />
                                        <label for="password">Password</label>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>

                                    <hr class="my-4" />
                                    <div class="row">
                                        {{-- <a class="col-6 text-left" href=""><p>Forgot Password</p></a> --}}
                                        <a class="col-12 text-right" href="{{ route('register') }}"><p>New User ? Sign Up</p></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @include('partials.footer')

    </body>
</html>
