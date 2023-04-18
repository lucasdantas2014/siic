<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chaves - Home</title>
    <<meta charset="utf-8">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body style = "background-color:green">
<!-- CABEÇALHO -->
<div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
    <div class="row" style = "width:100%;">
        <div class = "col-2">
            <img src="logo_campus.png" class = "p-3">
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
            <!-- USUÁRIOS -->
            <a  href="{{route('admin_usuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="user.png"> Usuários</a>
        </div>
        <div class = "col">
            <!-- CHAVES -->
            <a  href="{{route('admin_chaves')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="chaves.png">Chaves</a>
        </div>

        <div class = "col">
            <!-- EMPRÉSTIMO-->
            <a  href="{{route('admin_emprestimos')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-1" src="emprestimo.png">Empréstimo</a>
        </div>

        <div class = "col">
            <!-- DEVOLUÇÃO -->
            <a  href="{{route('devolucao')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="devolucao.png">Devolução</a>
        </div>

        <div class = "col">
            <!-- RELATÓRIOS -->
            <a  href="{{route('verpedidos')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="history.png">Relatórios</a>
        </div>
    </div>

</div>

    @yield('conteudo')

    @yield('rodape')
</body>
</html>
