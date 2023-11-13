@extends('layouts.admin')

@section('conteudo')
    <div id="div-usuarios" class="text-center mt-3 mb-4">
        <div class="row">

        <livewire:dynamic-table-usuarios />
    </div>

{{--    @include('admin.usuarios.modal_adicionar')--}}
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
