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
                <!-- Adicionar usuário -->
                <a  href="{{route('admin_usuarios_cadastrar_page')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Adicionar usuário</a>
            </div>
            <div class = "col">
                <!-- Trocar senha -->
                <a  href="{{route('trocarSenhaUsuario')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Trocar senha</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
            </div>
        </div>
    </div>

    <!-- LISTA DE USUÁRIOS -->
    <div class="container text-center mt-3 " style = "width:998px">
            <h3>Lista de usuários</h3>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">SIAPE</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone celular</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Setor</th>
                        <th scope="col">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                    <th scope="row">{{$user->nome}}</th>
                        <td>{{$user->siape}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->telefonecelular}}</td>
                        <td>{{$user->cargo}}</td>
                        <td>{{$user->setor}}</td>
                        <td>
                            <ul>
                                <li class="opcoes">
                                    <a href="{{ route("admin_usuarios_editar_page", $user->siape) }}">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </li>
                                @if(! ($user->is_admin))
                                    <li class="opcoes opcoes_vermelho">
                                        <a class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')" href="{{route('admin_usuarios_remover', $user->siape)}}">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
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

    .opcoes a {
        text-decoration: none;
        color: #000;

    }
</style>
@endsection
