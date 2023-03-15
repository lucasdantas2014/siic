<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves - Sistema de Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
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
                <!-- Adicionar chave -->
                <a  href="{{route('adicionarchave')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Adicionar chave</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
            </div>
        </div>
    </div>

    <!-- CORPO -->
    <div class = "container align-items-center">
    <!-- BUSCAR POR CATEGORIA -->
    <div class = "container text-center mt-4" style = "width:998px" >
        <form action="labscategoria" method="get">
            <select name="categoria" class = "form-control-lg">
                <option value="Sala de Aula">Busque por categoria</option>
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
            <input type="submit" class = "btn-lg" value = "Enviar">
        </form>
    </div>
    <!-- LISTA -->
    <div class="container mt-4" style = "width:998px" text-center>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Chave</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Descrição</th>
                            <th scope = "col">Status</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chaves as $chave)
                        <tr>
                            <td>{{$chave->nome}}</td>
                            <td>{{$chave->categoria}}</td>
                            <td>{{$chave->descricao}}</td>
                            <td>@if($chave->disponivel == true)
                                    <strong style = "color:green">Dispnível!</strong>
                                @endif
                                @if($chave->disponivel == false)
                                    <strong style = "color:red">Indisponível!</strong>
                                @endif
                            </td>
                            <td>
                                <ul>
                                    <li class="opcoes">
                                        <a href="{{ route("admin_chaves_editar_page", $chave->nome) }}">
                                            <i class="bi bi-pen"></i> editar
                                        </a>
                                    </li>
                                    <li class="opcoes opcoes_vermelho">
                                        <a class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')" href="{{route('admin_chaves_remover', $chave->nome)}}">
                                            <i class="bi bi-trash3"></i> removeryt
                                        </a>
                                    </li>
                                    <li class="opcoes opcoes_azul">
                                        <a onclick="return confirm('Você tem certeza?')" href="{{route('admin_chaves_alterar_status', $chave->nome)}}">
                                            <i class="bi bi-trash3"></i> alterar status
                                        </a>
                                    </li>
                                </ul>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    </div>
</body>
<style>
    .opcoes {
        display: inline;
        margin: 5px;
        padding: 5px;
        list-style: none;
        background-color: #c9ebaf;
        border-radius: 5px;
        text-decoration: none;
    }

    .opcoes_vermelho {
        background-color: #ebafaf;
    }

    .opcoes_azul {
        background-color: #afbbeb;
    }


    .opcoes a {
        text-decoration: none;
        color: #000;

    }
</style>
</html>

