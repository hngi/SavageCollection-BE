<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    @include('partials.style')

    <body>

        @include('partials.navbar')

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="content">
                        <h1>Savage Collector</h1>
                        <h3>FUNNY, SAVAGE REPLIES</h3>
                        <hr />
                        <a href="{{ url('/all_post') }}"><button class="btn btn-danger btn-lg"><i class="fa fa-paw"></i> See Savages</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="how-it-works" class="mt-5 container text-uppercase">
            <h3 class="text-center mb-5">How It Works</h3>
            <div class="justify-content-center box text-center container">
                <div class="card shadow-lg py-5 my-2 bg-info">
                    <p lass="card-text">1. Upload your Savage photo of choice.</p>
                </div>
                <div class="card shadow-lg py-5 my-2 bg-info">
                    <p lass="card-text">2. Get your points.</p>
                </div>
                <div class="card shadow-lg py-5 my-2 bg-info">
                    <p lass="card-text">3. Get value worth of points.</p>
                </div>
                <div class="card shadow-lg py-5 my-2 bg-info">
                    <p lass="card-text">4. Claim your rewards.</p>
                </div>
                <div class="card shadow-lg py-5 my-2 bg-info">
                    <p lass="card-text">5. Get paid.</p>
                </div>
            </div>
        </div>

        @include('partials.footer')
    </body>
</html>
