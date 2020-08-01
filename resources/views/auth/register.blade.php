<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    <body>

        <section class="register">
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
                        <h4>Sign up for free!</h4>
                    </div>
                    @if ($errors->all())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form name="signupForm" class="signupForm" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" id="username" required />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" required />
                        </div>
                        <div class="form-group">
                            <div class="pwdMask">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" title="Password must be 8 characters including 1 uppercase letter, 1 lowercase letter and numeric characters" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password" />
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">
                                Sign up with email
                            </button>
                        </div>
                        <div class="text-center">
                            <a href="{{ url('/login')}}">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        @include('partials.footer_scripts')
        <script>
            !(function (a) {
                "use strict";
                a("html, body");
                var e = a(".pwdMask > .form-control"),
                    t = a(".pwd-toggle");
                a(".lnk-toggler").on("click", function (t) {
                    t.preventDefault();
                    var e = a(this).data("panel");
                    a(".authfy-panel.active").removeClass("active"), a(e).addClass("active");
                }),
                    a(t).on("click", function (t) {
                        t.preventDefault(), a(this).toggleClass("fa-eye-slash fa-eye"), a(this).hasClass("fa-eye") ? a(e).attr("type", "text") : a(e).attr("type", "password");
                    });
            })(jQuery);
        </script>

    </body>
</html>
