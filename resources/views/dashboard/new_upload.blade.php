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

                    <div class="user-dashboard">
                        <h1>Hello, {{ Auth::user()->username }}</h1>

                        {{-- Success if available --}}
                        @if (\Session::has('success'))
                            <div class="alert alert-success">{!! \Session::get('success') !!}</div>
                        @endif
                        {{-- Error if available --}}
                        @if ($errors->all())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="container">
                            <h2>Image Upload</h2>
                            <hr />
                            <form method="POST" action="{{ route('add.image_upload') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                </div>
                                <div class="form-group">
                                    <label for="meme_image">Choose Image</label>
                                    <input type="file" class="form-control" id="meme_image" name="meme_image" />
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Upload</button>
                            </form>
                        </div>

                        <div class="container">
                            <h2>Text Upload</h2>
                            <hr />
                            <form method="POST" action="{{ route('add.text_upload') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" />
                                </div>
                                <div class="form-group">
                                    <label for="meme_text">Text</label>
                                    <textarea class="form-control" id="meme_text" name="meme_text" rows="5"></textarea>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('partials.dashboard_footer')

</html>
