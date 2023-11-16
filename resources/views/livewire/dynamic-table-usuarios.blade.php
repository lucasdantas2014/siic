<div>

    <div id="div-filtros" class="row mt-4 ml-4">
        <div class="col-md-4">
            <label for="nome-sala">Filtrar pelo nome: </label>
            <input id="nome-sala" class="form-control" type="text" name="nome-sala" wire:model="nome" placeholder="Digite o nome do usuário">
         </div>
    </div>
     <table id="tabela-usuarios" class="table table-striped mt-4">
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
            @foreach($usuarios as $user)
                <tr wire:click="editarUsuario({{ $user->id }})">
                    <td>{{$user->nome}}</td>
                    <td>{{$user->siape}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->cargo}}</td>
                    <td>{{$user->setor}}</td>
                    <td>
                        <ul>
                            <li class="opcoes">
                                <button>
                                    <a href="{{ route('admin_usuarios_editar_page', $user->siape) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </button>
                            </li>
                            @if(! ($user->is_admin))
                                <li class="opcoes opcoes_vermelho">
                                    <button class="opcoes opcoes_vermelho" >
                                        <a href="{{ route('admin_usuarios_remover', $user->siape) }}"
                                            class="opcoes opcoes_vermelho"
                                            onclick="return confirm('Você tem certeza que deseja remover o usuário de siape: {{ $user->siape }}?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div>
            {{ $usuarios->links() }}
        </div>

        @include('admin.usuarios.modal_adicionar')
</div>

<style>
    #div-filtros {
        padding-left: 10px
    }
</style>

<script>

</script>
