<div>

    <div class="container text-center mt-4">

        <select name="categoria" id ="categoria" wire:model="categoria" class = "form-control-lg ">
            <option selected value = "">Todas as Categorias</option>

            @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                <option value="{{ $categoria }}"> {{ $categoria }} </option>
            @endforeach
        </select>
    </div>

    <div class="container mt-4" style = "width:998px" text-center>
        <table id="tabela-usuarios" class="table table-striped mt-4">
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
            @foreach($chaves as $chave)
                <tr>
                    <td >{{$chave->nome}}</td>
                    <td >{{$chave->sala->nome}}</td>
                    <td >{{$chave->descricao}}</td>
                    <td >@if($chave->disponivel == true)
                            <strong style = "color:green">Disponível!</strong>
                        @endif
                        @if($chave->disponivel == false)
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
                                <a onclick="return confirm('Você tem certeza?')" href="{{route('admin_salas_alterar_status', $chave->nome)}}">
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

    @include('admin.chaves.modal_adicionar')
</div>

<style>
    .opcoes button {
        background-color: inherit;
        border: solid 0 #F6F5F4;
    }
</style>
</div>
