<div>

{{--        <input type="text" name="nome-usuario" placeholder="Filtrar por nome de usuário."/>--}}

    {{$usuario}}
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
                    <th scope="row">{{$user->nome}}</th>
                    <td>{{$user->siape}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->telefone}}</td>
                    <td>{{$user->cargo}}</td>
                    <td>{{$user->setor}}</td>
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
                            @if(! ($user->is_admin))
                                <li class="opcoes opcoes_vermelho">
                                    <button class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @include('admin.usuarios.modal_editar')
    </div>
</div>

<style>
    .opcoes button {
        background-color: inherit;
        border: solid 0 #F6F5F4;
    }
</style>

<script>

</script>
