@extends('layouts.admin')

@section('conteudo')
    <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
            <div class = "col">
                <!-- LOGIN -->
                <a  href="{{route('admin_dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
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
                    <th scope="col">Sala</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
                </thead>
                <tbody>
                @foreach($chaves as $chave)
                    <tr>
                        <td>{{$chave->nome}}</td>
                        <td>{{$chave->sala->nome}}</td>
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
                                        <i class="bi bi-trash3"></i> remover
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

@endsection()

