@if ( request()->is('login') != true && request()->is('register') != true )
    <footer class="mt-5">
        <div class="text-center pt-4 pb-2 justify-content-center align-items-center">
            <p class="text-uppercase text-white">&copy; Savage Collector 2020.</p>
            <p class="text-capitalize text-white">All rights reserved.</p>
        </div>
    </footer>
@endif

@if (request()->is('/'))
    <script src="{{ asset('assets/js/homepage.js') }}"></script>
@endif

@if (request()->is('login') || request()->is('register'))
    <script src="{{ asset('assets/js/login.js') }}"></script>
@endif

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>
<script src="https://kit.fontawesome.com/fc9346f24c.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/popper.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script>
$(function() {
    $('.lazy').lazy();
});
</script>
