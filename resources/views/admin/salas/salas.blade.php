@extends('layouts.admin')

@section('conteudo')
    <div id="div-usuarios" class="text-center mt-3 mb-4">
        <div class="row">
            <h2 class="col-4">Lista de salas</h2>

            <div id="div-botao-adicionar-usuario" class="col-md-8">
                <button
                    type="button"
                    id="botao-adicionar-usuario"
                    class="btn btn-default botao-verde"
                    data-bs-toggle="modal"
                    data-bs-target="#cadastrarUsuarioModal">
                    + Adicionar Sala
                </button>
            </div>
        </div>

        <livewire:dynamic-table-salas />
    </div>

    <style>

        #div-usuarios {
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

        #tabela-usuarios {
            background-color: #FFFFFF;
        }
    </style>
@endsection
