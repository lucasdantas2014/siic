<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar chave - Sistema de Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
<div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">
    <div class="row" style = "width:100%;">
        <div class = "col-2">
            <img src="logo_campus.png" class = "p-3">
        </div>
        <div class = "col-3 offset-5">
            <h1 class = "mt-4">Sistema de chaves</h1>
        </div>
    </div>
    <!-- LISTA DE OPÇÕES -->
    <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
        <div class = "col">
            <!-- LOGIN -->
            <a  href="{{route('dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
        </div>
        <div class = "col">
            <!-- Adicionar chave -->
            <a  href="{{route('admin_chaves')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">Lista de chaves</a>
        </div>
        <div class = "col">
            <!-- Logout -->
            <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
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
</div>
</div>

</body>
</html>
