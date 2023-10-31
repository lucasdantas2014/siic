<div class="modal fade" id="cadastrarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarUsuarioModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form action="{{route('admin_chaves_cadastrar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
                    @csrf
                    <div class="row">

                        <div class="form-group">
                            <label for="" class="form-label">Nome</label>
                            <input type="text" name="nome" class="form-control mb-4">
                        </div>

                        <div class="mb-3">

                            <label class = "mt-4 ">Sala</label>
                            <select name="sala" id = "sala" class = "form-control-lg">
                                @foreach($salas as $sala)
                                    <option value="{{ $sala->id }}">
                                        {{ $sala->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for = "descricao" class = "mt-4">Descrição</label>
                            <textarea class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre o laboratório"></textarea>

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
