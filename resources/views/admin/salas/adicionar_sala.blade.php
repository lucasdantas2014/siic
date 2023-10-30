@extends('layouts.admin')

@section('conteudo')

    <div class="container justify-content-center align-items-center" style = "width:998px">
        <form action="{{route('admin_salas_cadastrar')}}" method="post" class = "d-flex flex-column align-items-center">
            @csrf
                <h4 class="mb-4 mt-1" >Adicionar Sala</h4>
                <label><h5>Nome da Sala</h5></label>
                <input class = "form-control" style = "width:20rem" type="text" name="nome" placeholder = "Digite o nome da chave aqui">

                <label class = "mt-4 "><h5>Categoria do laboratório</h5></label>
                <select name="categoria" id ="categoria" class = "form-control-lg">
                    <option selected value = "#">Busque por categoria</option>

                    @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                        <option value="{{ $categoria }}"> {{ $categoria }} </option>
                    @endforeach
                </select>

                <label for = "descricao" class = "mt-4"><h5>Descrição</h5></label>
                <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="descricao" placeholder = "Faça uma descrição sobre o laboratório"></textarea>

                <input class = "btn btn-success btn-md m-3"  type="submit" value="Adicionar">
        </form>
    </div>
@endsection
