<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        @include('partials.navbar')

        <!-- savage collections -->
        <section id="collections" class="container-fluid">
            <div class="container">
                <div class="title text-center pb-5">
                    <h2>Collections</h2>
                </div>

                {{-- Initialize uploads variable --}}
                @php $user_uploads = App\Upload::all() @endphp
                @php $user_uploads_count = count($user_uploads) @endphp

                @if ($user_uploads_count > 0)
                    <div class="row">
                        @foreach ($user_uploads as $data)
                            @if ($data->type == 'image')
                                <div class="col-md-3 mb-5">
                                    <div class="img-wrap">
                                        <img src="{{ $data->image }}" class="img-fluid" />
                                    </div>
                                </div>
                            @else
                                <div class="col-md-3 mb-5">
                                    <div class="img-wrap">
                                        <h2 class="card-text text-dark">{{ $data->text }}</h2>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">We have collected any savages :( . Check back later</div>
                @endif
            </div>
        </section>

        @include('partials.footer')

        @include('partials.footer_scripts')
    </body>
</html>
