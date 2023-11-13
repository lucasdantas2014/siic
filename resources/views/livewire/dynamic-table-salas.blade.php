<div>

    <table id="tabela-salas" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Categoria</th>
                <th scope="col">Descrição</th>
                <th scope="col">Disponível</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salas as $sala)
            <tr>
                <td >{{$sala->nome}}</td>
                <td >{{$sala->categoria}}</td>
                <td >{{$sala->descricao}}</td>
                <td >@if($sala->disponivel == true)
                        <strong style = "color:green">Disponível!</strong>
                    @endif
                    @if($sala->disponivel == false)
                        <strong style = "color:red">Indisponível!</strong>
                    @endif
                </td>
                <td>
                    <ul>
                        <li class="opcoes">
                            <button
                                {{--                                    wire:click="editarUsuario({{ $user->id }})"--}}
                                {{--                                    class="btn btn-default botao-verde"--}}
                            >
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </li>
                            <li class="opcoes opcoes_vermelho">
                                <button class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </li>

                        <li class="opcoes opcoes_azul">
                            <a onclick="return confirm('Você tem certeza?')" href="{{route('admin_salas_alterar_status', $sala->nome)}}">
                                <i class="bi bi-trash3"></i> alterar status
                            </a>
                        </li>
                    </ul>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $salas->links() }}
    </div>

    @include('admin.salas.modal_adicionar')
</div>

<style>
    .opcoes button {
        background-color: inherit;
        border: solid 0 #F6F5F4;
    }
</style>
