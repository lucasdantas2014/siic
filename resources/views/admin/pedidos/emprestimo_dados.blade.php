@extends('layouts.admin')

@section('conteudo')

    <div id="div-main" class="row ">

        <div class="container text-center" style = "width:998px">

            <h3 class="mb-5 mt-4" >Emprestimo</h3>

            <div id="div-form">

                <span>Insira seu nº SIAPE e senha</span>

                <form action="{{route('admin_registrar_emprestimo')}}" method="post">

                    @csrf
                    <div class="form-group ">
                        <label for="siape">SIAPE</label>
                        <input type="text" id="siape" class="form-control" name="siape" disabled readonly value="{{ $user_siape }}">
                        @if ($errors->has('siape'))
                            <span class="text-danger">{{ $errors->first('siape') }}</span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label class = "mt-4 ">Chave</label>
                        <select name="chave" id = "sala" class = "form-control-lg">
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

                    <div>
                        <label for="chave" class="form-label mt-3">Outro material: </label>
                        <input name="material_extra" style = "width:20rem;" id="material_extra" class="form-control" placeholder = "Digite aqui">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="mt-4 btn col-md-10">Entrar</button>
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

    <style>

        body{
            background-color: #3EA14E;
        }

        #div-main {
            display: flex;
            flex-direction: row;
            align-items: center;
            font-family: Roboto-Black , serif;
            font-size: 14px;
        }

        #div-form {
            margin: auto;
            width: 450px;
            height: fit-content;
            background-color: #fff;
            border-radius: 15px;
            padding: 50px;

            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #div-form form {
            width: 100%;
        }

        #div-form span {
            font-family: Roboto-Bold, serif;
            margin-bottom: 20px;
        }

        #div-form input {
            border: 1px solid #000000;
            background-color: #FFFFFF;
        }

        #div-form label {
            float: left;
        }

        #div-form button {
            background-color: #3EA14E;
            color: #FFFFFF;
            width: 100%;
        }
    </style>
@endsection
