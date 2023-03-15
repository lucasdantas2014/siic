<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Troca de senha - Sistema de Chaves</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Troca de senha</title>
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
                    <a  href="{{route('dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
                </div>

                <div class = "col">
                    <!-- LOGIN -->
                    <a  href="{{route('verusuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">Lista de usuários</a>
                </div>

                <div class = "col">
                    <!-- Logout -->
                    <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
                </div>
            </div>
        </div>
    <!-- CORPO -->
    <div class="container text-center" style = "width:998px">
            <h3 class = "mt-5">Modificação de senha: </h3>
            <form action="storeTrocaSenha" method="get" class = "mt-5">
                @csrf
                <div class="mb-4 mt-4 d-flex flex-column align-items-center">
                    <label for="" class="form-label"><h5>Digite o SIAPE do usuário: </h5></label>
                    <input type="text" style = "width:20rem" name="siape" id="siape" class="form-control mb-3" placeholder="" aria-describedby="helpId">
                    <label for="" class="form-label"><h5>Digite a sua nova senha: </h5></label>
                    <input type="password" style = "width:20rem" name="senhanova" id="senhanova" class="form-control" placeholder="" aria-describedby="helpId">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif  
                </div>
                <button type="submit" class="btn btn-success btn-md">Confirmar</button>
            </form>
        </div>


    

</body>
</html>