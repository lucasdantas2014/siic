@extends('layouts.tecnico')

@section('conteudo')

    <div class="container justify-content-center align-items-center" style = "width:998px">
        <form action="{{route('tecnico_problema_registrar')}}" method="post" class = "d-flex flex-column align-items-center">
            @csrf
                <h4 class="mb-4 mt-1" >Registrar Problema</h4>
                <label><h5>Titulo</h5></label>
                <input class = "form-control" style = "width:20rem" type="text" name="titulo" placeholder = "Digite o nome da chave aqui">

                <label class = "mt-4 "><h5>Sala</h5></label>
                <select name="sala" id = "sala" class = "form-control-lg">
                    @foreach($salas as $sala)
                        <option value="{{ $sala->id }}">
                            {{ $sala->nome }}
                        </option>
                    @endforeach
                </select>

                <label for = "descricao" class = "mt-4"><h5>Descrição</h5></label>
                <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre o laboratório"></textarea>

                <input class = "btn btn-success btn-md m-3"  type="submit" value="Registrar">
        </form>
    </div>
@endsection
