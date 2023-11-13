@extends('layouts.admin')

@section('conteudo')

<div id="div-devolucao" class="mt-3 mb-4">
    <div class="row">
        <h2 class="col-4">Registro de devolução</h2>
    </div>

    <div id="div-form">
        <form action="{{route('admin_registrar_devolucao')}}" method="post">
            @csrf

            <div class="row">

                <div class="form-group col-md-3">
                    <label class="mt-4 ">Chave</label>
                    <select name="chave" id = "sala" class="form-control form-control-lg div-form-input">
                        @if (count($chaves) == 0)
                            <option value="">
                                Nenhuma chave está reservada
                            </option>
                        @endif
                        @foreach($chaves as $chave)
                            <option value="{{ $chave->id }}">
                                {{ $chave->nome }} - {{ $chave->sala->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="chave" class="form-label mt-3">Digite o SIAPE da pessoa que devolveu essa chave:</label>
                    <input type="text" name="siape" id="siape" class="form-control input-form" />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="chave" class="form-label mt-3">Se você tiver visto algum problema no laboratório, digite aqui (opcional):</label>
                    <textarea class = "mb-3 form-control input-form div-form-input" rows = "10" name="problema" placeholder = "Faça a descrição aqui"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success mt-4 form-control-lg">
                        Enviar
                    </button>
                </div>
            </div>

        @if($errors->any)
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
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
            width: 100%;
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
