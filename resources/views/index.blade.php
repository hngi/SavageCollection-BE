<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        @include('partials.navbar')

        <!-- Hero -->
        <header id="hero" class="container-fluid d-flex align-items-center">
            <div class="hero-text container text-center">
                <h1>Funny Savage Collector</h1>
                <p>Funny, savage replies</p>
                <a href="{{ url('/all')}}" class="btn btn-lg action-1 px-5 my-2 my-sm-0" role="button">See Savages</a>
            </div>
        </header>

        <!-- How -->
        <section id="how" class="container-fluid text-center">
            <div class="container">
                <div class="title text-center pb-5">
                    <h2>How It Works</h2>
                </div>
                <div class="row">
                    <div class="outline col-md">
                        <div class="icon">
                            <img src="{{ asset('assets/images/upload.svg') }}" class="img-fluid" alt="upload" />
                        </div>
                        <p>Upload savage photo</p>
                    </div>
                    <div class="outline col-md">
                        <div class="icon">
                            <img src="{{ asset('assets/images/points.svg') }}" class="img-fluid" alt="points" />
                        </div>
                        <p>Get value worth of points</p>
                    </div>
                    <div class="outline col-md">
                        <div class="icon">
                            <img src="{{ asset('assets/images/reward.svg') }}" class="img-fluid" alt="reward" />
                        </div>
                        <p>Claim your rewards</p>
                    </div>
                    <div class="outline col-md">
                        <div class="icon">
                            <img src="{{ asset('assets/images/paid.svg') }}" class="img-fluid" alt="get paid" />
                        </div>
                        <p>Get paid</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- savage collections -->
        <section id="collections" class="container-fluid">
            <div class="container">
                <div class="title text-center pb-5">
                    <h2>Our Collections</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_1.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_2.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_3.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_4.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_5.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="img-wrap">
                            <img src="assets/images/collections/showcase_1_img_6.jpg" class="img-fluid" alt="collections" />
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ url('/all') }}" class="btn btn-lg action-1 px-5 my-2 my-sm-0" role="button">See More</a>
                </div>
            </div>
        </section>

        @include('partials.footer')

        @include('partials.footer_scripts')
    </body>
</html>
