<div class="modal fade" id="cadastrarProblemaModal" tabindex="-1" role="dialog" aria-labelledby="cadastrarProblemaModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <form action="{{route('tecnico_problema_registrar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
                    @csrf
                    <div class="row">

                        <div>
                            <label class = "">Titulo</label>
                            <input class = "form-control" type="text" name="titulo">
                        </div>

                        <div class="form-group">
                            <label class="form-label">Sala</label>
                            <select name="sala" id = "sala" class="form-select form-select-lg">
                                @foreach($salas as $sala)
                                    <option value="{{ $sala->id }}">
                                        {{ $sala->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for = "descricao" class = "mt-4"><h5>Descrição</h5></label>
                            <textarea class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre do problema encontrado"></textarea>
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

    #cadastrarProblemaModal .modal-content{
        background-color: #F6F5F4;
        font-family: Roboto-Black, serif;
        font-size: 12px;
        color: #000000;
    }

    #div-botao-acoes {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
</style>
