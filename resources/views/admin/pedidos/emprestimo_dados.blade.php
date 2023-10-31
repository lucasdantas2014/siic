@extends('layouts.admin')

@section('conteudo')

    <div id="div-main" class="row ">

        <div class="container text-center" style = "width:998px">

            <h3 class="mb-5 mt-4" >Emprestimo</h3>

            <div id="div-form">

                <span>Insira seu nº SIAPE e senha</span>

                <form action="{{route('admin_registrar_emprestimo')}}" method="post">

                    <input type="hidden" name="siape" value="{{ $user_siape }}">

                    @csrf
                    <div class="form-group ">
                        <label for="siape">SIAPE</label>
                        <input type="text" id="siape" class="form-control" name="siape" readonly value="{{ $user_siape }}">
                        @if ($errors->has('siape'))
                            <span class="text-danger">{{ $errors->first('siape') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="chave" class="form-label mt-3">Caso você  leve algum material extra, digite aqui: </label>
                        <input name="material_extra" style = "width:20rem;" id="material_extra" class="form-control" placeholder = "Digite aqui">
                    </div>

                    <div>
                        <label for="chave" class="form-label mt-3">Caso você  leve algum material extra, digite aqui: </label>
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
@endsection
