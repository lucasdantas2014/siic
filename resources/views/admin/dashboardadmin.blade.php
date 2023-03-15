<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistema de Chaves</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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

    <div class = "container text-center">
        <img src="Logotipo_IFET.svg" class = "m-5" style = "width:20%;height:20%;">
    </div>

    <!-- Código HTML da página -->

<!-- Verifica se a sessão flash existe e exibe o modal -->
    @if (session('mensagem') ?? session('mensagemDevolucao') ?? session('mensagemTroca') ?? session('mensagemRegistro') ?? session('mensagemLaboratorio'))
        <div class="modal fade" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="modalMensagemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center">
                        <img src="Certo.png" style = "width:40%;height:40%">
                        @if(session('mensagem'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagem') }}</h5>
                            <p style = "color:black"><strong>Laboratório:  </strong>{{session('dados')->chave->nomelab}}</p>
                            <p style = "color:black"><strong>Usuário:  </strong>{{session('dados')->user->nome}}</p>
                        @endif

                        @if(session('mensagemDevolucao'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagemDevolucao') }}</h5>
                        @endif
                        @if(session('mensagemTroca'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagemTroca') }}</h5>
                        @endif

                        @if(session('mensagemRegistro'))
                            <h5 class = "mt-2 mb-4">{{session('mensagemRegistro')}}</h5>
                        @endif
                        @if(session('mensagemLaboratorio'))
                            <h5 class = "mt-2 mb-4">{{session('mensagemLaboratorio')}}</h5>
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
