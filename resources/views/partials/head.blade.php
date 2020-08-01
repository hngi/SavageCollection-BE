<head>
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
</head>
