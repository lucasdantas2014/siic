@extends('layouts.app')

@section('conteudo')

    <div id="div-main">

        <div id="div-form" class="row">

            <div id="div-titulo" class="col-md-10">
                <h1 id="titulo">Entrar</h1>
                <label>Insira seu n° SIAPE e senha</label>
            </div>

            <form method="POST" class="row" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="siape">SIAPE</label>
                        <input type="text" id="siape" class="form-control" name="siape" autofocus>
                            @if ($errors->has('siape'))
                                <span class="text-danger">{{ $errors->first('siape') }}</span>
                            @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password" class="mt-4">Senha</label>
                        <input type="password" id="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            @if(session()->has('alert'))

                                   <p>{{ session()->get('alert') }}</p>

                            @endif
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="mt-4 btn col-md-10">Entrar</button>
                    </div>
            </form>
        </div>
    </div>

    <style>

        #div-main {
            display: flex;
            width: 100vw;
            height: 100vh;
            flex-direction: row;
            align-items: center;
            font-family: Roboto-Black , serif;
            background-color: #3EA14E;
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

        #div-titulo {
            text-align: center;
        }


        #div-form input {
            border: 1px solid #000000;
            background-color: #FFFFFF;
        }

        #div-form button {
            background-color: #3EA14E;
            color: #FFFFFF;
            width: 100%;
        }
    </style>
@endsection
