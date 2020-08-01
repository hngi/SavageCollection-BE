<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body>

        @include('partials.navbar')

        <main class="mt-5">
            <section id="welcome" class="d-flex justify-content-center align-items-center">
                <div class="justify-content-center">
                    <h1 class="text-uppercase text-center text-white">Savage Collector</h1>
                    <p class="text-uppercase text-center text-white">Funny, savage replies</p>
                    <p class="text-capitalize text-center">
                        <a href="{{ url('/all')}}" class="btn text-white px-4 py-2" id="btn-see"><i class="fa fa-paw mr-2"></i>see savages</a>
                    </p>
                </div>
            </section>

            <section id="how-it-works" class="mt-5 justify-content-center">
                <h3 class="text-uppercase text-dark text-center mb-5">how it works</h3>
                <div class="justify-content-center box text-center container">
                    <div class="card shadow-lg py-5 bg-warning">
                        <p lass="card-text">1. Upload your Savage photo of choice.</p>
                    </div>
                    <div class="card shadow-lg py-5 bg-warning">
                        <p lass="card-text">2. Get your points.</p>
                    </div>
                    <div class="card shadow-lg py-5 bg-warning">
                        <p lass="card-text">3. Get value worth of points.</p>
                    </div>
                    <div class="card shadow-lg py-5 bg-warning">
                        <p lass="card-text">4. Claim your rewards.</p>
                    </div>
                    <div class="card shadow-lg py-5 bg-warning">
                        <p lass="card-text">5. Get paid.</p>
                    </div>
                </div>
            </section>

            <section id="images-display" class="mt-5 justify-content-center">
                <h3 class="text-uppercase text-dark text-center mb-5">our collections</h3>
                <div class="grid-box container-fluid text-center justify-content-center px-sm-5">
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-1" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-2" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-3" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-4" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-5" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-6" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-7" />
                    </div>
                    <div>
                        <img src="assets/images/dada-awu.jpeg" class="img-fluid" data-toggle="modal" data-target="#myModal-8" />
                    </div>
                </div>
                <!-- modals -->
                <div class="modal fade" id="myModal-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-2">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-3">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-4">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-5">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-6">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-7">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="myModal-8">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="assets/images/dada-awu.jpeg" class="img-fluid img-rescale" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <a href="view.html" class="btn px-4 py-2 text-capitalize text-white" id="btn-view">view more</a>
                </div>
            </section>
        </main>

        @include('partials.footer')
    </body>
</html>
