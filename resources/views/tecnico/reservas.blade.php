@extends('layouts.tecnico')

@section('conteudo')

    <div class="tabela-pedidos">
        <table>
            <thead class="row">
                <th class="col-md-2"> Nome da chave</th>
                <th class="col-md-2"> Descrição</th>
                <th class="col-md-2"> Controle do Ar</th>
                <th class="col-md-2"> Outros materiais</th>
                <th class="col-md-2"> Data da reserva</th>
                <th class="col-md-2"> Status </th>
            </thead>

            <tbody>
                @foreach($reservas as $reserva)
                    <tr class="row">
                        <td class="col"> {{ $reserva->chave->nome }}</td>
                        <td class="col-md-2"> {{ $reserva->chave->descricao }}</td>
                        <td class="col-md-2"> {{ $reserva->controle}}</td>
                        <td class="col-md-2"> {{ $reserva->outros_materiais }}</td>
                        <td class="col-md-2"> {{ $reserva->created_at }}</td>
                        @if( $reserva->status == \App\Models\Pedido::STATUS_PENDENTE)
                            <td class="col-md-2"> Pendente</td>
                        @else
                            <td class="col-md-2"> Devolvido</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .tabela-pedidos {
            width: 998px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endsection
