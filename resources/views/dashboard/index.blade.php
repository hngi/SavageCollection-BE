<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        @include('partials.navbar')
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}" />

        <div class="container">
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
        </div>

        <!-- main -->
        <main>
            <div class="user">
                <div class="user-box">
                    <div class="user-photo">
                        <img src="./assets/images/user-img.png" alt="user image" />
                    </div>
                    <div class="user-details">
                        <p class="user-name">
                            <span class="text-dark">{{ Auth::user()->username }}</span>
                        </p>
                        <p class="user-email text-dark">
                            Email: <span class="email">{{ Auth::user()->email }}</span>
                        </p>
                    </div>
                    <hr />
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <div class="user-dashboard">
                    <div class="user-dashboard-figures">
                        <div class="user-dashboard-figure">
                            <p class="title">Total Uploads</p>
                            <p class="figure">{{ App\Upload::where('user_id', Auth::user()->id)->count() }}</p>
                        </div>
                        <div class="user-dashboard-figure">
                            <p class="title">Total Points</p>
                            <p class="figure">{{ App\Upload::where('user_id', Auth::user()->id)->count() * 3 }}</p>
                        </div>
                        <div class="user-dashboard-figure">
                            <p class="title">Cash Equivalent</p>
                            <p class="figure">₦ {{ App\Upload::where('user_id', Auth::user()->id)->count() * 0.035 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            @php $user_uploads = App\Upload::where('user_id', Auth::user()->id)->get() @endphp
            @php $user_uploads_count = count($user_uploads) @endphp

            <div class="container">
                <div class="title text-center pb-5">
                    <h2>Your Uploads</h2>
                </div>

                {{-- Initialize uploads variable --}}
                @php $user_uploads = App\Upload::where('user_id', Auth::user()->id)->get() @endphp
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
                    <div class="alert alert-warning">You haven't uploaded any savage :( </div>
                @endif
            </div>

            <div class="container">
                <div class="title text-center pb-5">
                    <h2>New Upload</h2>
                </div>
                <div class="user-upload"></div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h4 class="text-dark">Image Upload</h4>
                        <form method="POST" action="{{ route('add.image_upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="upload">
                                <input type="file" name="meme_image" />
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Upload</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="text-dark">Text Upload</h4>
                        <form method="POST" action="{{ route('add.text_upload') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="upload">
                                <textarea name="meme_text" class="form-control" rows="5"></textarea>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <!-- main -->

        @include('partials.footer')

        @include('partials.footer_scripts')
    </body>
</html>
