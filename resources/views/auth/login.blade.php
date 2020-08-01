<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        <section id="login">
            <div class="row">
                <div class="col-lg-5 logo d-flex align-items-center justify-content-center text-center">
                    <div>
                        <a href="{{ url('/')}}" class="brand">
                            SC
                        </a>
                        <p><hr></p>
                        <a href="{{ url('/')}}">Go back to home</a>
                    </div>
                </div>
                <div class="col-lg-7 form">
                    <div class="text-center mb-5">
                        <h4>Login to your account</h4>
                        <p>Don't have an account? <a href="{{ url('/register')}}">Sign Up Free!</a></p>
                    </div>
                    @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="form-signin">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required />
                        </div>
                        <div class="form-group">
                            <div class="pwdMask">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required placeholder="Password" />
                            </div>
                        </div>
                        <button type="submit" class="mt-3 btn btn-lg btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </section>


        @include('partials.footer_scripts')
    </body>
</html>
