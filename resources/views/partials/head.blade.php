{{-- <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    @if (request()->is('/'))
        <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}" />
    @endif

    @if (request()->is('login') || request()->is('register'))
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    @endif

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" />

    <link rel="stylesheet" href="{{ asset('assets/fonts/LemonJellyPersonalUse-dEqR.ttf') }}" />

    <title>Savage Collector</title>
</head> --}}
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet" />
    <!-- Fonts Awesome -->
    <script src="https://kit.fontawesome.com/fc9346f24c.js" crossorigin="anonymous"></script>

    @if (request()->is('/') || request()->is('all'))
    <link rel="stylesheet" href="{{ asset('assets/css/homepage2.css') }}" />
    @endif

    @if (request()->is('login'))
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    @endif

    @if (request()->is('register'))
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}" />
    @endif
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <title>Savage Collectionse</title>
</head>
