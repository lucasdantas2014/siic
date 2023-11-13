@extends('layouts.admin')

@section('conteudo')

<div id="div-devolucao" class="mt-3 mb-4">
    <div class="row">
        <h2 class="col-4">Editar usuário</h2>
    </div>

    <div id="div-form">
        <form action="{{route('admin_usuarios_editar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
            @csrf
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control mb-4" value="{{ $usuario->nome }}">
                </div>

                <!-- SIAPE -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">SIAPE</label>
                    <input type="text" name="siape-show"  class="form-control mb-4" disabled readonly value="{{ $usuario->siape }}">
                </div>
                <input type="hidden" name="siape" value="{{ $usuario->siape }}" />

                {{-- <!-- SENHA -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">Senha:</label>
                    <input type="password" name="password"  class="form-control mb-4" value=".......">
                </div> --}}

                <!-- Setor -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">Setor do usuário: </label>
                    <input type="text" name="setor"  class="form-control mb-4" value="{{ $usuario->setor }}">
                </div>

                <!-- Telefone celular -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">Telefone celular do usuário </label>
                    <input type="text" name="telefone"  class="form-control mb-4" value="{{ $usuario->telefone }}">
                </div>

                <!-- Email -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">Email do usuário </label>
                    <input type="text" name="email"  class="form-control mb-4" value="{{ $usuario->email }}">
                </div>

                <!-- CARGO -->
                <div class="form-group col-md-4">
                    <label for="" class="form-label">Cargo:</label>
                    <select class="form-select form-select-lg" name="cargo" >
                        {{-- <option value = "#" selected>Selecione uma opção</option> --}}
                        <option value="monitor" {{ $usuario->cargo == "monitor" ? "selected" : ""; }}>Monitor</option>
                        <option value="professor" {{ $usuario->cargo == "professor" ? "selected" : ""; }}>Professor</option>
                        <option value="outro" {{ $usuario->cargo == "outro" ? "selected" : ""; }}>Outro</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="" class="form-label">Tipo Usuário:</label>
                    <select class="form-select form-select-lg" name="tipo" >
                        <option value = "#" selected>Selecione uma opção</option>
                        @foreach(\App\Models\User::USERS_TIPOS as $key => $value)
                            <option value="{{ $key }}" {{ $usuario->tipo == $key ? "selected" : ""  }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </div>

                @if($errors->any)
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endif

                <div class="row">
                    <div id="div-botao-acoes"  class="form-group mt-4">
                        <button type="submit" class="btn botao-verde">Cadastrar</button>
                        <button type="button" class="btn botao-cinza" data-bs-dismiss="modal">Cancelar</button>
                    </div>
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
