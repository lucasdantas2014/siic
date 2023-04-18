@extends('layouts.admin')

@section('conteudo')
    <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
            <div class = "col">
                <!-- Adicionar chave -->
                <a  href="{{route('adicionarchave')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Adicionar chave</a>
            </div>
        </div>
    </div>

<div class="container justify-content-center align-items-center" style = "width:998px">
    <form action="{{ route("admin_chaves_editar") }}" method="post" class = "d-flex flex-column align-items-center">
        @csrf
        @method("POST")
        <h4 class="mb-4 mt-1" >Adicionar Chave</h4>
        <label><h5>Nome da chave</h5></label>
        <input   class = "form-control" style = "width:20rem" type="text" name="nome" value="{{ $chave->nome }}">


        <label class = "mt-4 "><h5>Categoria do laboratório</h5></label>

        <select name="categoria" id = "categoria" class = "form-control-lg">

            @foreach(\App\Models\Chave::CATEGORIAS as $categoria)
                @if($categoria == $chave->categoria)
                    <option value = "{{ $categoria }}" selected>{{ $categoria }}</option>
                @else
                    <option value = "{{ $categoria }}">{{ $categoria }}</option>
                @endif
            @endforeach
        </select>

        <label for = "descricao" class = "mt-4"><h5>Descrição</h5></label>
        <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="descricao"> {{ $chave->descricao }} </textarea>

        <input class = "btn btn-success btn-md m-3"  type="submit" value="Salvar">
    </form>
</div>
@endsection()
