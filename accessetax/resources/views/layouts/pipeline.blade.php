<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Voltaria - Pipeline</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- custom.css -->
    @vite(['resources/css/app.css'])
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('custom-styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    {{--  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />  --}}


    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
</head>

<body class=" s">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @yield('pipeline')

    @include('layouts.partials.footer')
    <!-- AOS -->
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init({});
    </script>
</body>

</html>
