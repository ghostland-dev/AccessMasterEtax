<!doctype html>
<html lang="fr">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Access E-Tax') }}</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('custom-styles.css') }}" />


</head>

<body>
    <div id="spinner" class="d-none">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @guest()
        @include('layouts.partials.header')
    @endguest
    @auth
        @include('layouts.partials.sidebar')
    @endauth
    <div class="fullheight">
        @yield('content')
    </div>
    @include('layouts.partials.footer')


</body>

</html>
