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
                {{-- Initialize uploads variable --}}
                @php $user_uploads = App\Upload::paginate(15) @endphp
                @php $user_uploads_count = count($user_uploads) @endphp

                @if ($user_uploads_count > 0)
                    <div class="row">
                        @foreach ($user_uploads as $data)
                            @if ($data->type == 'image')
                                <div class="col-md-3 mb-5">
                                    <div class="img-wrap">
                                        <img data-src="{{ $data->image }}" class="img-fluid lazy" />
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 mb-5">
                                    <div class="img-wrap">
                                        <h4 class="text-white text_wrapper">{{ $data->text }}</h4>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">We haven't collected any savages :( . Check back later</div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ url('/all') }}" class="btn btn-lg action-1 px-5 my-2 my-sm-0" role="button">See More</a>
                </>
            </div>
        </section>

        @include('partials.footer')

        @include('partials.footer_scripts')
    </body>
</html>
