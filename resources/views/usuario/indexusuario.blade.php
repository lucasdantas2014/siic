<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>    
    <title>Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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
                <!-- Trocar senha -->
                <a  href="{{route('trocarsenhaIndex')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Trocar senha</a>
            </div>
            <div class = "col">
                <!-- Histórico de pedidos -->
                <a  href="{{route('pedidosusuariocomum')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Histórico de pedidos</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">Sair</a>
            </div>
        </div>
    </div>

    <div class = "container-fluid">
        <div class="row justify-content-center align-items-center p-0">
            <div class="col-9">
                <h3 class = "p-4">Informações do usuário</h3>
                    <div class = "p-4">
                        <h6>Nome:  {{$user->nome}}</label></h6>
                        <h6>SIAPE:  {{$user->siape}}</h6>
                        <h6>Email:  {{$user->email}}</h6>
                        <h6>Telefone celular: {{$user->telefonecelular}} </h6>
                        <h6 class = "mt-4">Setor:  {{$user->setor}}</h6>
                        <h6>Cargo:  {{$user->cargo}}</h6>
                    </div>
            </div>
        </div>
    </div>
    @if (session('mensagemTroca'))
        <div class="modal fade" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="modalMensagemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center">
                        <img src="Certo.png" style = "width:40%;height:40%">
                        @if(session('mensagemTroca'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagemTroca') }}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Ativa o modal automaticamente -->
        <script>
            $(document).ready(function() {
                $('#modalMensagem').modal('show');
            });
        </script>
    @endif
</body>
</html>