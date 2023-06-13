<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistema de Chaves</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    @vite(['resources/js/app.js'])


    @yield('custom-head')

</head>
<body>

    <div id="main">
    <div id="header" class="row">
        <div class="col-md-5">
            <img src="{{asset('admin/logo_campus.png')}}">
        </div>
        <div class = "col-md-6">
            <h1 class = "mt-4">Sistema de chaves</h1>
        </div>
        <div class = "col-md-1">
            <a href="{{route('logout')}}">Sair</a>
        </div>

    </div>


    <div id="navbar" class="row">
        <div class = "col-md-3 navbar-item">
            <!-- USUÁRIOS -->
            <a  href="{{route('admin_usuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">
                <img src={{asset('admin/user.png')}}> Usuários
            </a>
        </div>

        <div class = "col-md-2 navbar-item">
            <a  href="{{route('admin_chaves')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">
                <img src={{asset('admin/chaves.png')}}> Chaves
            </a>
        </div>

        <div class = "col-md-2 navbar-item">
            <!-- EMPRÉSTIMO-->
            <a  href="{{route('admin_emprestimos')}}" class="btn btn-default border"> <img src={{asset('admin/emprestimo.png')}}>Empréstimo</a>
        </div>

        <div class = "col-md-2 navbar-item">
            <!-- DEVOLUÇÃO -->
            <a  href="{{route('admin_devolucao')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img src={{asset('images/devolucao.png')}}>Devolução</a>
        </div>

        <div class = "col-md-3 navbar-item">
            <!-- RELATÓRIOS -->
            <a  href="{{route('verpedidos')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img src={{asset('admin/history.png')}}>Relatórios</a>
        </div>
    </div>


    @yield('conteudo')

    @include('layouts.footer')

    </div>

</body>
<style>

    #main {
        width: 998px;
        margin-right: auto;
        margin-left: auto;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    #header {
        width: 100%;
        height: 175px;
        background-image: url(background.png);
        display: flex;
        align-items: center;
    }

    #navbar {
        width: 100%;
        justify-content: center;
    }

    #navbar img {
        height: 50px;
    }

    .navbar-item {
        padding: 0;
    }

    .navbar-item a {

    }

</style>
</html>
