@extends('layouts.admin')

@section('conteudo')

    <!-- CORPO -->
    <div class="row justify-content-center align-items-center g-2">

         <!-- FORMULÁRIO DE EMPRÉSTIMO -->
        <div class="container text-center" style = "width:998px">

            <h3 class="mb-5 mt-4" >Emprestimo</h3>
            <form action="{{route('admin_login_emprestimo')}}" method="post" class = "d-flex flex-column align-items-center justify-content-center">
                <!-- SIAPE -->
                    @csrf

                    <label for="chave" class="form-label"><h5>SIAPE da pessoa que deseja pegar a chave:</h5> </label>
                    <input name="siape" id="siape" class="form-control" style = "width:20rem" placeholder = "Digite aqui">
                <!-- SENHA -->

                    <label for="chave" class="form-label mt-4"><h5>Senha:</h5> </label>
                    <input  type = "password" name="senha" id="senha" class="form-control" style = "width:20rem" placeholder = "Digite aqui">

                <!-- BOTÃO ENVIAR -->
                <input type="submit" class = "btn btn-success btn-md mt-4" value="Enviar">
                @if($errors->any)
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @endif
            </form>
        </div>
    </div>
@endsection
