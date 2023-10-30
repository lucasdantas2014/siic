<div class="modal fade" id="cadastrarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarUsuarioModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form action="{{route('admin_usuarios_cadastrar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
                    @csrf
                    <div class="row">

                        <div>
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control mb-4">
                        </div>

                        <!-- SIAPE -->
                        <div class="form-group">
                            <label for="" class="form-label">SIAPE</label>
                            <input type="text" name="siape"  class="form-control mb-4">
                        </div>

                        <!-- SENHA -->
                        <div class="form-group">
                            <label for="" class="form-label">Senha:  </label>
                            <input type="password" name="password"  class="form-control mb-4">
                        </div>

                        <!-- Setor -->
                        <div class="form-group">
                            <label for="" class="form-label">Setor do usuário: </label>
                            <input type="text" name="setor"  class="form-control mb-4">
                        </div>

                        <!-- Telefone celular -->
                        <div class="form-group">
                            <label for="" class="form-label">Telefone celular do usuário </label>
                            <input type="text" name="telefone"  class="form-control mb-4">
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="" class="form-label">Email do usuário </label>
                            <input type="text" name="email"  class="form-control mb-4">
                        </div>

                        <!-- CARGO -->
                        <div class="mb-3">
                            <label for="" class="form-label">Cargo:</label>
                            <select class="form-select form-select-lg" name="cargo" >
                                <option value = "#" selected>Selecione uma opção</option>
                                <option value="monitor">Monitor</option>
                                <option value="professor">Professor</option>
                                <option value="outro">Outro</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Tipo Usuário:</label>
                            <select class="form-select form-select-lg" name="tipo" >
                                <option value = "#" selected>Selecione uma opção</option>
                                @foreach(\App\Models\User::USERS_TIPOS as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        @if($errors->any)
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif
                        <div id="div-botao-acoes">
                            <button type="submit" class="btn botao-verde">Cadastrar</button>
                            <button type="button" class="btn botao-cinza" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<style>

    #cadastrarUsuarioModal .modal-content{
        background-color: #F6F5F4;
        font-family: Roboto-Black, serif;
        font-size: 12px;
    }

    #div-botao-acoes {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
</style>
