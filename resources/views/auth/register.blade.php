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
                                <h5 class="card-title text-center">Sign Up</h5>
                                <form class="form-signin">
                                    <div class="form-label-group">
                                        <input type="text" id="username" class="form-control" placeholder="Username" required autofocus />
                                        <label for="username">Username</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="email_address" class="form-control" placeholder="Email address" required />
                                        <label for="email_address">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="password" class="form-control" placeholder="Password" required />
                                        <label for="password">Password</label>
                                    </div>

                                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Create Account</button>
                                    <hr class="my-4" />
                                    <div class="row">
                                        {{-- <a class="col-6 text-left" ><p></p></a> --}}
                                        <a class="col-12 text-right" href="{{ route('login') }}"><p>Already have an account ? Sign In</p></a>
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
