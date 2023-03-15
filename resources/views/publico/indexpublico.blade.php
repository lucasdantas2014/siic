<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratórios ativos - Sistema de Chaves</title>
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
                <!-- LOGIN -->
                <a  href="{{route('login')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src="user.png"> Login</a>
            </div>
        </div>
    </div>
    <!-- CORPO -->
    <div class="container" style = "width:998px;">
        <div class="row justify-content-center align-items-center ">
            <!-- LISTA DE PEDIDOS -->
            <div class="col d-flex flex-column align-items-center">
                <!-- TÍTULO -->
                    <h3 class = 'px-5 py-3'>Laboratórios ativos</h3>
                <!-- BUSCA -->
                    <form action="buscacategoria" method="get" class = "mt-3">
                                    <select name="categoria" id = "categoria" class = "form-control-lg">
                                        <option selected value = "#">Busque por categoria</option>
                                        <option value="Sala de Aula">Sala de Aula</option>
                                        <option value="Mineração">Mineração</option>
                                        <option value="Física">Física</option>
                                        <option value="Matematica">Matemática</option>
                                        <option value="Linguagens e Códigos">Linguagens e Códigos</option>
                                        <option value="Biologia">Biologia</option>
                                        <option value="Humanas">Humanas</option>
                                        <option value="Ginásio">Ginásio</option>
                                        <option value="Petróleo e Gás">Petróleo e Gás</option>
                                        <option value="Informática">Informática</option>
                                        <option value="Quimíca">Química</option>
                                        <option value="Ambiente Administrativo">Ambiente Administrativo</option>
                                        <option value="Construção de Edifícios">Construção de Edifícios</option>
                                    </select>
                                    <input type="submit" value="Buscar" class = 'btn-lg ml-1'>
                </form>
                <!-- LISTA -->
                <div class="container pt-4">
                    <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Categoria</th>
                                    <th scope ="col">Usuário</th>
                                    <th scope="col">Chave</th>
                                    <th scope="col">Hora Início</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                    <tr>
                                        <th>{{$pedido->chave->categoria}}</td>
                                        <td>{{$pedido->user->nome}}</td>
                                        <td>{{$pedido->chave->nomelab}}</td>
                                        <td>{{$pedido->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>