@extends('layouts.tecnico')

@section('conteudo')

    <div id="div-tabela-problemas">
        <table id="tabela-problemas" class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr class="row">
                    <th class="col-md-2"> Nome da chave</th>
                    <th class="col-md-2"> Descrição</th>
                    <th class="col-md-1"> Resolvido em</th>
                    <th class="col-md-2"> Sala </th>
                    <th class="col-md-2"> Data de registro </th>
                    <th class="col-md-1"> Status </th>
                    <th class="col-md-2"> Opções </th>
                </tr>
            </thead>

            <tbody>
                @foreach($problemas as $problema)
                    <tr class="row">
                        <td class="col"> {{ $problema->titulo }}</td>
                        <td class="col-md-2"> {{ $problema->descricao }}</td>
                        <td class="col-md-1"> {{ $problema->data_resolvido ?? '-' }}</td>
                        <td class="col-md-2"> {{ $problema->sala->nome }}</td>
                        <td class="col-md-2"> {{ $problema->created_at }}</td>
                        @if( $problema->status == \App\Models\Problema::STATUS_PENDENTE)
                            <td class="col-md-1"> Pendente</td>
                            <td class="col-md-2"><a href="{{ route('tecnico_problema_resolver', [$problema->id]) }}" class="btn btn-primary"> Resolver</a></td>
                        @else
                            <td class="col-md-1"> Resolvido</td>
                            <td class="col-md-2"> - </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        #div-tabela-problemas {
            width: 998px;
            margin-left: auto;
            margin-right: auto;
        }


        #tabela-problemas {
            margin-right: auto;
            margin-left: auto;
        }


    </style>
@endsection
