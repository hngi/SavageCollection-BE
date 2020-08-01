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

                        <div class="row">
                            <div class="col-md-4">
                                <div class="card-counter primary">
                                    <i class="fa fa-code-fork"></i>
                                    <span class="count-numbers">{{ App\Upload::where('user_id', Auth::user()->id)->count() }}</span>
                                    <span class="count-name">Uploads</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-counter danger">
                                    <i class="fa fa-ticket"></i>
                                    <span class="count-numbers">{{ App\Upload::where('user_id', Auth::user()->id)->count() * 3 }}</span>
                                    <span class="count-name">Points</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-counter success">
                                    <i class="fa fa-database"></i>
                                    <span class="count-numbers">₦ {{ App\Upload::where('user_id', Auth::user()->id)->count() * 0.035 }}</span>
                                    <span class="count-name">Cash Equivalent</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>

    @include('partials.dashboard_footer')

</html>
