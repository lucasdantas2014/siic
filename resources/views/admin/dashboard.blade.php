@extends('layouts.admin')

@section('conteudo')

@endsection

@extends('layouts.admin')

@section('conteudo')
    <!-- LISTA DE USUÁRIOS -->
    <div id="div-usuarios" class="container text-center mt-3 " style = "width:998px">
        <div class="row">
            <h2 class="col-4">Lista de usuários</h2>
            <div class="col-md-8">
                <button>

                </button>
            </div>
        </div>


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
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->cargo}}</td>
                    <td>{{$user->setor}}</td>
                    <td>
                        <ul>
                            <li class="opcoes">
                                <a href="{{ route("admin_usuarios_editar_page", $user->siape) }}">
                                    editar
                                    <i class="bi bi-pen"></i>
                                </a>
                            </li>
                            @if(! ($user->is_admin))
                                <li class="opcoes opcoes_vermelho">
                                    <a class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')" href="{{route('admin_usuarios_remover', $user->siape)}}">
                                        remover<i class="bi bi-trash3"></i>
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
