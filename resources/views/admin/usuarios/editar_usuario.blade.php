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
                <a  href="{{route('admin_dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
            </div>
            <div class = "col">
                <!-- Lista de usuários -->
                <a  href="{{route('admin_usuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">Lista de usuários</a>
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
                <form action="{{route('admin_usuarios_editar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
                    @csrf
                    <!-- NOME -->
                    <label for="" class="form-label"><h5>Nome do usuário: </h5></label>
                    <input type="text" name="nome" style = "width:20rem" id="nome" class="form-control mb-4" value="{{$user->nome}}">

                    <!-- SIAPE -->

                    <label for="" class="form-label"><h5>SIAPE do usuário: </h5></label>
                    <input type="text" name="siape" style = "width:20rem" id="siape" class="form-control mb-4" value="{{$user->siape}}" readonly>

                    <!-- Setor -->

                    <label for="" class="form-label"><h5>Setor do usuário: </h5></label>
                    <input type="text" name="setor" style = "width:20rem" id="setor" class="form-control mb-4" value="{{$user->setor}}">

                    <!-- Telefone celular -->

                    <label for="" class="form-label"><h5>Telefone celular do usuário </h5></label>
                    <input type="text" name="telefone" style = "width:20rem" id="telefone" class="form-control mb-4" value="{{$user->telefone}}">

                    <!-- Email -->

                    <label for="" class="form-label"><h5>Email do usuário </h5></label>
                    <input type="text" name="email" style = "width:20rem" id="email" class="form-control mb-4" value="{{$user->email}}"">

                    <!-- CARGO -->
                    <div class="mb-3">
                        <label for="" class="form-label"><h5>Cargo:</h5></label>
                        <select class="form-select form-select-lg" name="cargo" id="">
                            <option value = "#">Selecione uma opção</option>
                            @foreach(["monitor", "professor", "outro"] as $opcaoDeCargo)
                                @if($user->cargo == $opcaoDeCargo)
                                    <option value="{{ $opcaoDeCargo }}" selected> {{ $opcaoDeCargo }} </option>
                                @else
                                    <option value="{{ $opcaoDeCargo }}"> {{ $opcaoDeCargo }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @if($errors->any)
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-success btn-md">Salvar</button>
                </form>
        </div>
</body>
</html>
