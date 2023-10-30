
<div>
    <div class="div-filtros row">

        <div class="input-group col-4">
            <label for="categoria">Categoria: </label>
            <select name="categoria" id ="categoria" wire:model="categoria" class = "form-control">
                <option selected value = "">Todas as Categorias</option>

                @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                    <option value="{{ $categoria }}"> {{ $categoria }} </option>
                @endforeach
            </select>
        </div>

        <div class="input-group col-4">
            <label for="nome-pessoa">Nome: </label>
            <input id="nome-pessoa" class="form-control" type="text" name="nome-sala" wire:model="nomeSala" placeholder="Buscar pelo nome da sala...">
        </div>
    </div>

    <div class="container mt-4" style = "width:998px" text-center>
        <table class="table">
            <thead>
            <tr class="row">
                <th class="col-md-2" scope="col">Nome</th>
                <th class="col-md-2" scope="col">Categoria</th>
                <th class="col-md-2" scope="col">Descrição</th>
                <th class="col-md-2" scope="col">Disponível</th>
                <th class="col-md-4" scope="col">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salas as $sala)
                <tr class="row">
                    <td class="col-md-2">{{$sala->nome}}</td>
                    <td class="col-md-2">{{$sala->categoria}}</td>
                    <td class="col-md-2">{{$sala->descricao}}</td>
                    <td class="col-md-2">@if($sala->disponivel == true)
                            <strong style = "color:green">Disponível!</strong>
                        @endif
                        @if($sala->disponivel == false)
                            <strong style = "color:red">Indisponível!</strong>
                        @endif
                    </td>
                    <td class="col-md-4">
                        <ul class="lista-opcoes">
                            <li class="opcoes">
                                <a href="{{ route("admin_salas_editar_page", $sala->nome) }}">
                                    <i class="bi bi-pen"></i> editar
                                </a>
                            </li>
                            <li class="opcoes opcoes_vermelho">
                                <a class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')" href="{{route('admin_salas_remover', $sala->nome)}}">
                                    <i class="bi bi-trash3"></i> remover
                                </a>
                            </li>
                            <br/>
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
        </div>
    </div>
    <style>

        .lista-opcoes {
            display: flex;
            padding: 0px
        }
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
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;

        }
    </style>


</div>
