<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chaves - SIIC</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link href="{{ asset('css/publico.css') }}" rel="stylesheet">

    @livewireStyles()
</head>
<body>
    <!-- CABEÇALHO -->
    <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
            <div class="row" style = "width:100%;">
                <div class = "col-2">
                    <img src="logo_campus.png" class = "p-3">
                </div>
                <div class = "col-3 offset-5">
                    <h1 class = "mt-4">Sistema de chaves</h1>
                </div>
            </div>
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
        <div class = "col">
                <!-- LOGIN -->
                <a  href="{{route('login_page')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="user.png"> Login</a>
            </div>
        </div>
    </div>
    <!-- CORPO -->
    <div class="container" style = "width:998px;">
        <div class="row justify-content-center align-items-center ">
            <!-- LISTA DE PEDIDOS -->
            <livewire:dynamic-table-publico />

        </div>
    </div>
    @livewireScripts()
</body>
</html>
