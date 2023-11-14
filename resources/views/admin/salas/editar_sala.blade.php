@extends('layouts.admin')

@section('conteudo')

<div id="div-devolucao" class="mt-3 mb-4">
    <div class="row">
        <h2 class="col-4">Editar Sala</h2>
    </div>

    <div id="div-form">
        <form action="{{route('admin_salas_editar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
            @csrf
            <div class="row">
                <input type="hidden" name="sala_id" value="{{ $sala->id }}" />
                <div class="form-group">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control mb-4" value="{{ $sala->nome }}">
                </div>

                <div class="mb-3">

                    <label class="mr-4">Categoria do laboratório</label>
                    <select name="categoria" id ="categoria" class = "form-control-lg ml-4">
                        <option selected value = "#">Busque por categoria</option>

                        @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                            <option value="{{ $categoria }}" {{ $sala->categoria == $categoria ? 'selected' : '' }}> {{ $categoria }} </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for = "descricao" class = "mt-4">Descrição</label>
                    <textarea class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre o laboratório"> {{ $sala->descricao ?? '' }}</textarea>

                </div>
                @if($errors->any)
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endif
                <div id="div-botao-acoes">
                    <button type="submit" class="btn botao-verde">Salvar</button>
                    <button type="button" class="btn botao-cinza" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>
    @livewireScripts

    <style>
        #div-devolucao {
            padding: 20px;
            color: #3EA14E;
            font-family: Roboto-Bold, serif;
        }

        #div-form {
            color: #000;
        }

        #div-form form {
            width: 40%;
            font-size: 14px;
        }

        #div-form span {
            font-family: Roboto-Bold, serif;
            margin-bottom: 20px;
        }

        #div-form input {
            border: 1px solid #000000;
            background-color: #FFFFFF;
            width: 100%;
        }

        .div-form-select {
            border: 1px solid #000000;
            background-color: #FFFFFF;
            width: 100%;
        }

        #div-form label {
            float: left;

        }

        #div-botao-acoes {
            display: flex;
            flex-direction: row;
        }

        #div-form button {
            background-color: #3EA14E;
            color: #FFFFFF;
            width: 100%;
        }

        .h-vazio {
            color: #F6F5F4;
        }
    </style>

@endsection
