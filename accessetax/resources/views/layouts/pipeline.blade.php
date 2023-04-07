<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <meta name="description" content="">
    <link rel="icon" href="favicon.png" sizes="32x32" type="image/png">
    <!-- custom.css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
</head>

<body>


    @yield('pipeline')
    <!-- AOS -->
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init({});
    </script>
</body>

</html>
