<div>
    <div id="div-main" class="row ">
        <div class="container text-center">
            <h3 class="mb-5 mt-4" >Emprestimo</h3>
            <div class="row">
                <div id="div-dados-usuario" class="col-md-6">
                    <div class="div-form">
                        <span>Insira seu nº SIAPE e senha</span>
                        <form>
                            @csrf

                            <div class="form-group col-md-12">
                                <label for="siape">SIAPE</label>
                                <input type="text" id="siape" class="form-control" name="siape" autofocus wire:model="siape">
                                @if ($errors->has('siape'))
                                    <span class="text-danger">{{ $errors->first('siape') }}</span>
                                @endif
                            </div>
                            <div class="form-group col-md-12">
                                <label for="password" class="mt-4">Senha</label>
                                <input type="password" id="password" class="form-control" name="senha" wire:model="senha">

                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                @if(session()->has('alert'))

                                    <p>{{ session()->get('alert') }}</p>

                                @endif
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="mt-4 btn col-md-10" wire:click="validarUsuario">Entrar</button>
                            </div>
                            @if($errors->any)
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>


                @if (isset($usuarioValido))
                    <div id="div-dados-pedido" class="col-md-6">
                        <div class="div-form">

                            <form action="{{route('admin_registrar_emprestimo')}}" method="post">
                                @csrf

                                <input type="hidden" name="siape" value="{{ $siape }}">

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

                                <div class="col-md-12">
                                    <label for="chave" class="form-label mt-3">Outro material: </label>
                                    <input id="material_extra" class="form-control" type="text" name="material_extra" placeholder = "Digite aqui">
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
                @endif
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

        #div-dados-usuario {
            border-right: 1px solid #000
        }

        .div-form {
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
</div>
