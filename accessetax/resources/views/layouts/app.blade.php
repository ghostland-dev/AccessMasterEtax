<!doctype html>
<html lang="fr">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Access E-Tax') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom-styles.css') }}" />





</head>

<body class="  ">


    <div id="particle-container"></div>

    <div id="spinner" class="d-none ">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    @guest()
        @include('layouts.partials.header')
    @endguest
    @auth
        <div class="   hidden lg:grid md:hidden sm:hidden ">
            @include('layouts.partials.sidebar')
        </div>
    @endauth

    @yield('content')

    @include('layouts.partials.footer')
    {{--  <script src="{{ asset('js/celebration-particles.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.10.1/tsparticles.confetti.bundle.min.js"></script>  --}}

</body>

</html>
