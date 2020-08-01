<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet" />
    <!-- Fonts Awesome -->
    <script src="https://kit.fontawesome.com/fc9346f24c.js" crossorigin="anonymous"></script>


    @if (request()->is('login'))
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    @endif

    @if (request()->is('register'))
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
    @endif

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    @if (request()->is('/') || request()->is('all') || request()->is('dashboard') )
    <link rel="stylesheet" href="{{ asset('assets/css/homepage2.css') }}" />
    @endif

    <title>Savage Collectionse</title>
</head>
<style>
    img.lazy {
        background-image: url("{{ asset('loading.gif') }}");
        background-repeat: no-repeat;
        background-position: 50% 50%;
    }
</style>
