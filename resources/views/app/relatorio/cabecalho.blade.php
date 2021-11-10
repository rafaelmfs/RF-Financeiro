<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <title>Relatório - {{$relatorio}}</title>
</head>
<body>
    <div class="container">
        <header class="d-flex p-2 cabecalho-report"  style="text-align:center">
                <div class="d-flex justify-content-between mt-4">
                    {{-- <img src="{{ asset('imagens/logorf-removebg.png') }}" some text width=20% class="mx-2"> --}}
                    <div class="pt-4">
                        <h2>Relatório de {{$relatorio}}</h2>
                        <h4>Usuário - {{ucwords(mb_strtolower($usuario->name, $encoding = mb_internal_encoding()));}}</h4>
                    </div>
                </div>
        </header>


