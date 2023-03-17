<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Access E-Tax') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('custom-styles.css') }}" rel="stylesheet" />

</head>

<body>
    @guest()
        @include('layouts.partials.header')
    @endguest
    @auth
        @include('layouts.partials.sidebar')
    @endauth

    <div class="" style="min-height: 90vh ">
        @yield('content')
    </div>
    @include('layouts.partials.footer')
</body>

</html>
