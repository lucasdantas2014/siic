@extends('layouts.admin')

@section('conteudo')
    <div class = "container text-center">
        <h4 class = "m-3 mb-5">Cadastro de usuário</h4>

        <!-- FORMULÁRIO -->
        <form action="{{route('admin_usuarios_cadastrar')}}" method="post" class = "d-flex flex-column justify-content-center align-items-center" >
            @csrf
            <!-- NOME -->
            <label for="" class="form-label"><h5>Nome do usuário: </h5></label>
            <input type="text" name="nome" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui: ">

            <!-- SIAPE -->

            <label for="" class="form-label"><h5>SIAPE do usuário: </h5></label>
            <input type="text" name="siape" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

            <!-- SENHA -->

            <label for="" class="form-label"><h5>Senha: </h5> </label>
            <input type="password" name="password" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui: ">

            <!-- Setor -->

            <label for="" class="form-label"><h5>Setor do usuário: </h5></label>
            <input type="text" name="setor" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

            <!-- Telefone celular -->

            <label for="" class="form-label"><h5>Telefone celular do usuário </h5></label>
            <input type="text" name="telefone" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

            <!-- Email -->

            <label for="" class="form-label"><h5>Email do usuário </h5></label>
            <input type="text" name="email" style = "width:20rem" id="" class="form-control mb-4" placeholder="Digite aqui:">

            <!-- CARGO -->
            <div class="mb-3">
                <label for="" class="form-label"><h5>Cargo:</h5></label>
                <select class="form-select form-select-lg" name="cargo" id="">
                    <option value = "#" selected>Selecione uma opção</option>
                    <option value="monitor">Monitor</option>
                    <option value="professor">Professor</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="" class="form-label"><h5>Tipo Usuário:</h5></label>
                <select class="form-select form-select-lg" name="tipo" id="">
                    <option value = "#" selected>Selecione uma opção</option>
                    @foreach(\App\Models\User::USERS_TIPOS as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            @if($errors->any)
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
            <button type="submit" class="btn btn-success btn-md">Cadastrar</button>
        </form>
    </div>
@endsection
