<div>

    <div id="div-tabela-problemas">
        {{--  <div class="mt-4" style="display: flex;">
            <a type="button" class="btn btn-info col-md-2" href="{{ route('tecnico_problema_registrar_page') }}" style="width: 300px !important; margin-left: auto; margin-rigth: 10px">Registrar Novo Problema</a>
        </div>

        <div class="container text-center mt-4">

            <select name="categoria" id ="categoria" wire:model="categoria" class = "form-control-lg ">
                <option selected value = "">Todas as Categorias</option>

                @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                    <option value="{{ $categoria }}"> {{ $categoria }} </option>
                @endforeach
            </select>
        </div>  --}}
        <table id="tabela-problemas" class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr class="row">
                    <th class="col-md-2"> Nome da chave</th>
                    <th class="col-md-2"> Descrição</th>
                    <th class="col-md-2"> Resolvido em</th>
                    <th class="col-md-1"> Sala </th>
                    <th class="col-md-2"> Data de registro </th>
                    <th class="col-md-1"> Status </th>
                    <th class="col-md-2"> Opções </th>
                </tr>
            </thead>

            <tbody>
                @foreach($problemas as $problema)
                    <tr class="row">
                        <td class="col-md-2"> {{ $problema->titulo }}</td>
                        <td class="col-md-2"> {{ $problema->descricao }}</td>
                        <td class="col-md-2"> {{ $problema->data_resolvido ? \Carbon\Carbon::parse($problema->data_resolvido)->format('d/m/Y H:i:s') : '-' }}</td>
                        <td class="col-md-1"> {{ $problema->sala->nome }}</td>
                        <td class="col-md-2"> {{ $problema->created_at ? \Carbon\Carbon::parse($problema->created_at)->format('d/m/Y H:i:s') : '-' }}</td>
                        @if( $problema->status == \App\Models\Problema::STATUS_PENDENTE)
                            <td class="col-md-1">
                                <strong style = "color:red">Pendente!</strong>
                            </td>
                            <td class="col-md-2"><a href="{{ route('tecnico_problema_resolver', [$problema->id]) }}" class="btn botao-cinza-2"> Resolver</a></td>
                        @else
                            <td class="col-md-1">
                                <strong style = "color:green">Devolvido!</strong>
                            </td>
                            <td class="col-md-2"><button href="" class="btn botao-verde"> Resolvido</button></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .opcoes button {
            background-color: inherit;
            border: solid 0 #F6F5F4;
        }

        .btn {
            width: 70%;
        }

        .botao-verde {
            background-color: #3EA14E;
            color: #FFFFFF !important;
            max-width: 200px;
            float: right;
            font-size: 14px !important;
            margin-right: 20px;
            border: 1px solid #3EA14E;
        }

        .botao-verde:hover {
            background-color: #3EA14E;
            color: #FFFFFF !important;
            border: 1px solid #3EA14E;
        }

        .botao-cinza-2 {
            background-color: #C3C3C3;
            color: #FFFFFF !important;
            max-width: 200px;
            float: right;
            font-size: 14px !important;
            margin-right: 20px;
            border: 1px solid #C3C3C3;
        }

        .botao-cinza-2:hover {
            background-color: #C3C3C3;
            color: #FFFFFF !important;
            border: 1px solid #C3C3C3;
        }

    </style>
</div>
