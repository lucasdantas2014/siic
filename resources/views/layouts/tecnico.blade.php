<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chaves - Home</title>
    <<meta charset="utf-8">
    <!-- Scripts -->
    <script src="{{ asset('tecnico/js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('tecnico/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">

    @vite(['resources/js/app.js'])
</head>

<body>
<!-- CABEÇALHO -->
<div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
    <div class="row" style = "width:100%;">
        <div class = "col-2">
            <img src="{{asset('tecnico/logo_campus.png')}}" class = "p-3">
        </div>
        <div class = "col-3 offset-5">
            <h1 class = "mt-4">Sistema de chaves</h1>
        </div>
        <div class = "col-1 offset-1">
            <a href="{{route('logout')}}" class = "mt-4">Sair</a>
        </div>
    </div>

    <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">

        <div class = "col">
            <!-- DEVOLUÇÃO -->
            <a  href="{{ route('tecnico_reservas')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="{{asset('tecnico/devolucao.png')}}">Reservas</a>
        </div>

        <div class = "col">
            <!-- PROBLEMAS -->
            <a  href="{{ route('tecnico_problemas')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="{{asset('tecnico/devolucao.png')}}">Problemas</a>
        </div>

        <div class = "col">
            <!-- RELATÓRIOS -->
            <a  href="{{ route('tecnico_relatorios') }}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="{{asset('tecnico/history.png')}}">Relatórios</a>
        </div>
    </div>

</div>

@yield('conteudo')

@yield('rodape')
</body>
</html>
