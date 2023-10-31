@extends('layouts.admin')

@section('conteudo')

    <div id="div-main" class="row ">

        <div class="container text-center" style = "width:998px">

            <h3 class="mb-5 mt-4" >Emprestimo</h3>

            <div id="div-form">

                <span>Insira seu nº SIAPE e senha</span>

                <form action="{{route('admin_login_emprestimo')}}" method="post">
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
                            <input type="password" id="password" class="form-control" name="senha">

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
    </style>
@endsection
