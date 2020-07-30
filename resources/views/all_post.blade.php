<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    @include('partials.style')

    <body>

        @include('partials.navbar')

        <div class="container mt-5">
            <div class="row">
                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <div class="card text_meme">
                      <div class="card-body text-center">
                        <h2 class="card-text text-dark">orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,.</h2>
                      </div>
                    </div>
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>

                <div class="mb-3 col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <img src="http://fakeimg.pl/365x365/" class="img-responsive meme_size">
                </div>
            </div>
        </div>

        @include('partials.footer')
    </body>
</html>
