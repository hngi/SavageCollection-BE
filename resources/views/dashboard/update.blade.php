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

                       
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{!! \Session::get('error') !!}</div>
                        @endif
                       

                        <div class="container">
                            <h2>Text Update</h2>
                            <hr />
                            @foreach($data as $data)
                            <form method="POST" action="{{ route('dashboard.update', $data->id )}}">
                                @method("PUT")
                                @csrf
                                
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control" id="title" placeholder="Title" />
                                </div>
                                <div class="form-group">
                                    <label for="meme_text">Text</label>
                                    <textarea class="form-control" id="meme_text" name="meme_text" rows="5">{{ $data->text }}</textarea>
                                </div>
                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Update</button>
                            </form>
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('partials.dashboard_footer')

</html>
