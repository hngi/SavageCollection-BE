<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.dashboard_head')

    @include('partials.dashboard_style')

    <body class="home">
        <div class="container-fluid display-table">
            <div class="row display-table-row">

                @include('partials.dashboard_sidebar')

                <div class="col-md-10 col-sm-11 display-table-cell v-align">

                    <div class="row">
                        <header>
                            <div class="col-md-7">
                                <nav class="navbar-default pull-left">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                </nav>
                            </div>
                        </header>
                    </div>

                    @php $user_uploads = App\Upload::where('user_id', Auth::user()->id)->get() @endphp
                    @php $user_uploads_count = count($user_uploads) @endphp

                    <div class="user-dashboard">
                        <h1>Hello, {{ Auth::user()->username }}</h1>

                        <div class="container mt-5">

                            @if ($user_uploads_count > 0)
                                <div class="row">
                                    @foreach ($user_uploads as $data)
                                        @if ($data->type == 'image')
                                            <div class="mb-3 col-lg-4 col-md-4">
                                                <img data-src="{{ $data->image }}" class="lazy img-responsive meme_size">
                                            </div>
                                        @else
                                            <div class="mb-3 col-lg-4 col-md-4">
                                                <div class="card text_meme">
                                                <div class="card-body text-center">
                                                    <h2 class="card-text text-dark">{{ $data->text }}</h2>
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="alert alert-warning">You haven't uploaded any post :(</div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('partials.dashboard_footer')

</html>
