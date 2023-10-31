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
                    + Adicionar Chave
                </button>
            </div>
        </div>

        <livewire:dynamic-table-chaves/>
    </div>


@endsection()

