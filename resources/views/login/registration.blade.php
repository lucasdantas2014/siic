<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adicionar usuário - Sistema de Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <!-- LOGIN -->
                <a  href="{{route('dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
            </div>
            <div class = "col">
                <!-- Lista de usuários -->
                <a  href="{{route('verusuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">Lista de usuários</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
            </div>
        </div>
    </div>

        <div class = "container text-center">
                <h4 class = "m-3 mb-5">Cadastro de usuário</h4>

                <!-- FORMULÁRIO -->
                <form action="{{route('register')}}" method="get" class = "d-flex flex-column justify-content-center align-items-center" >
                    <!-- NOME -->
                    <label for="" class="form-label"><h5>Nome do usuário: </h5></label>
                    <input type="text" name="nome" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui: ">
            
                    <!-- SIAPE -->
                   
                    <label for="" class="form-label"><h5>SIAPE do usuário: </h5></label>
                    <input type="text" name="siape" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">
                    
                    <!-- SENHA -->
                    
                    <label for="" class="form-label"><h5>Senha: </h5> </label>
                    <input type="password" name="password" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui: ">

                    <!-- Setor -->
                   
                    <label for="" class="form-label"><h5>Setor do usuário: </h5></label>
                    <input type="text" name="setor" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">
                    
                    <!-- Telefone celular -->
                   
                    <label for="" class="form-label"><h5>Telefone celular do usuário </h5></label>
                    <input type="text" name="telefonecelular" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

                    <!-- Email -->
                   
                    <label for="" class="form-label"><h5>Email do usuário </h5></label>
                    <input type="text" name="email" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

                    <!-- CARGO -->
                    <div class="mb-3">
                        <label for="" class="form-label"><h5>Cargo:</h5></label>
                        <select class="form-select form-select-lg" name="cargo" id="">
                            <option value = "#" selected>Selecione uma opção</option>
                            <option value="monitor">Monitor</option>
                            <option value="professor">Professor</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    @if($errors->any)
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success btn-md">Cadastrar</button>
                </form>
        </div>
</body>
</html>