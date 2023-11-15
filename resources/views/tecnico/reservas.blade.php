@extends('layouts.tecnico')

@section('conteudo')

<div id="div-reservas" class="text-center mt-3 mb-4">
    <div class="row">
        <h2 class="col-4">Lista de Reservas</h2>
    </div>

    <div>
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th class="col"> Nome da chave</th>
                    <th class="col"> Descrição</th>
                    {{-- <th class="col-md-2"> Controle do Ar</th> --}}
                    <th class="col"> Outros materiais</th>
                    <th class="col"> Data da reserva</th>
                    <th class="col"> Status </th>
                    <th class="col"> Data devolução </th>
                </tr>

            </thead>

            <tbody>
                @foreach($reservas as $reserva)
                    <tr>
                        <td class="col"> {{ $reserva->chave->nome }}</td>
                        <td class="col"> {{ $reserva->chave->descricao }}</td>
                        {{-- <td class="col-md-2"> {{ $reserva->controle}}</td> --}}
                        <td class="col"> {{ $reserva->outros_materiais }}</td>
                        <td class="col"> {{ $reserva->created_at ? \Carbon\Carbon::parse($reserva->created_at)->format('d/m/Y H:i:s') : '-'}}</td>
                        <td class="col">

                            @if( $reserva->status == \App\Models\Pedido::STATUS_PENDENTE)
                                <strong style = "color:green">Disponível!</strong>
                            @else
                                <strong style = "color:red">Indisponível!</strong>
                            @endif
                        </td>
                        <td class="col"> {{ $reserva->devolvido_em ? \Carbon\Carbon::parse($reserva->devolvido_em)->format('d/m/Y H:i:s') : '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
    <style>
        #div-reservas {
            color: #3EA14E;
            font-family: Roboto-Bold, serif;
        }

        #botao-adicionar-usuario {
            max-width: 200px;
            float: right;
            font-size: 14px !important;
            margin-right: 20px;
        }

        .opcoes {
            display: inline;
            list-style: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }

        .opcoes_vermelho {
            color: #A30D11 !important;
        }

        .opcoes a {
            text-decoration: none;
            color: #000;
        }

        #tabela-reservas {
            background-color: #FFFFFF;
        }
    </style>
@endsection
