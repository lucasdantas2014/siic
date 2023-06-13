@extends('layouts.tecnico')

@section('conteudo')

    <div class="div-tabela-pedidos">
        <table id="tabela-pedidos" class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr class="row">
                    <th class="col-md-2"> Nome da chave</th>
                    <th class="col-md-2"> Descrição</th>
                    {{-- <th class="col-md-2"> Controle do Ar</th> --}}
                    <th class="col-md-2"> Outros materiais</th>
                    <th class="col-md-2"> Data da reserva</th>
                    <th class="col-md-2"> Status </th>
                    <th class="col-md-2"> Data devolução </th>
                </tr>

            </thead>

            <tbody>
                @foreach($reservas as $reserva)
                    <tr class="row">
                        <td class="col-md-2"> {{ $reserva->chave->nome }}</td>
                        <td class="col-md-2"> {{ $reserva->chave->descricao }}</td>
                        {{-- <td class="col-md-2"> {{ $reserva->controle}}</td> --}}
                        <td class="col-md-2"> {{ $reserva->outros_materiais }}</td>
                        <td class="col-md-2"> {{ $reserva->created_at ? \Carbon\Carbon::parse($reserva->created_at)->format('d/m/Y H:i:s') : '-'}}</td>
                        @if( $reserva->status == \App\Models\Pedido::STATUS_PENDENTE)
                            <td class="col-md-2"> Pendente</td>
                        @else
                            <td class="col-md-2"> Devolvido</td>
                        @endif
                        <td class="col-md-2"> {{ $reserva->devolvido_em ? \Carbon\Carbon::parse($reserva->devolvido_em)->format('d/m/Y H:i:s') : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .div-tabela-pedidos {
            width: 998px;
            margin-left: auto;
            margin-right: auto;
        }


        #tabela-pedidos {
            margin-right: auto;
            margin-left: auto;
            text-align: center
        }
    </style>
@endsection
