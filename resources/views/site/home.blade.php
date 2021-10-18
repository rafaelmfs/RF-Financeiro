<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RF </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

</head>

<body class="antialiased">

    @include('components.top-bar')
    @include('site.carousel')
    @include('site.content')

    <footer class="container">
        <p class="float-right"><a href="#"><ion-icon name="arrow-up-outline"></ion-icon></a></p>
        <p>&copy; {{date("Y")}} RF Financeiro &middot; <a href="#">Politica de Privacidade</a> &middot;</p>
    </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
