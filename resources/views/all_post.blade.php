<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('partials.head')

    @include('partials.style')

    <body>

        @include('partials.navbar')

        <div class="min_wrap">

            {{-- Initialize uploads variable --}}
            @php $user_uploads = App\Upload::all() @endphp
            @php $user_uploads_count = count($user_uploads) @endphp

            <div class="container mt-5">
                @if ($user_uploads_count > 0)
                    <div class="row">
                        @foreach ($user_uploads as $data)
                            @if ($data->type == 'image')
                                <div class="mb-3 col-lg-4 col-md-4">
                                    <img data-src="{{ asset('uploads/memes/'.$data->image) }}" class="lazy img-responsive meme_size">
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
                    <div class="alert alert-warning">We have collected any savages :( . Check back later</div>
                @endif
            </div>
        </div>

        @include('partials.footer')
    </body>
</html>
