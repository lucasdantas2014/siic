@extends('layouts.admin')

@section('conteudo')



    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12 m-2 text-center">

            <h3 class="m-3 mt-4" >Devolução</h3>
            <!-- CORPO -->
            <div class="container" style = "width:998px">
            <!-- FORMULÁRIO DE DEVOLUÇÃO -->
            <form action="{{route('admin_registrar_devolucao')}}" class = "d-flex align-items-center flex-column" method="post">
                @csrf

                <label class = "mt-4 "><h5>Chave</h5></label>
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

                <label for="chave" class="form-label mt-3"><h5>Digite o SIAPE da pessoa que devolveu essa chave:</h5></label>
                <input type="text" name="siape" id="siape" class="form-control" style = "width:20rem;">

                <label for="chave" class="form-label mt-3"><h5>Se você tiver visto algum problema no laboratório, digite aqui (opcional): </h5></label>
                <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="problema" placeholder = "Faça a descrição aqui"></textarea>

            <input type="submit" class = "btn btn-success btn-md mt-4" value="Devolver">
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
            </form>

            </div>
        </div>
    </div>
    @livewireScripts

@endsection
