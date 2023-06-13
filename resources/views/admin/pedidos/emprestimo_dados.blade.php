@extends('layouts.admin')

@section('conteudo')

    <!-- CORPO -->
    <div class="container justify-content-center align-items-center" style = "width:998px;">

         <!-- FORMULÁRIO DE EMPRÉSTIMO -->
        <div class="container m-2 text-center">

            <h3 class="m-3" >Emprestimo</h3>
            <form action="{{route('admin_registrar_emprestimo')}}" method="post" class = "d-flex flex-column align-items-center">
                <!-- CHAVE -->
                @csrf

                <input type="hidden" name="siape" value="{{ $user_siape }}">

{{--                <div class="flex flex-col justify-around h-full">--}}
{{--                    @livewire('dropdowns')--}}
{{--                </div>--}}

                <label class = "mt-4 "><h5>Chave</h5></label>
                <select name="chave" id = "sala" class = "form-control-lg">
                    @foreach($chaves as $chave)
                        <option value="{{ $chave->id }}">
                            {{ $chave->nome }} - {{ $chave->sala->nome }}
                        </option>
                    @endforeach
                </select>

                <!-- CONTROLE AR -->

                    {{-- <label for="chave" class="form-label mt-3"><h5>Qual controle de ar condicionado você usará?:</h5> </label>
                    <input name="controle"  style = "width:20rem;"id="controle" class="form-control" placeholder = "Digite aqui" > --}}

                <!-- MATERIAL EXTRA -->

                    <label for="chave" class="form-label mt-3"><h5>Caso você  leve algum material extra, digite aqui:</h5> </label>
                    <input name="material_extra" style = "width:20rem;" id="material_extra" class="form-control" placeholder = "Digite aqui">

                <!-- BOTÃO ENVIAR -->
                <input type="submit" class = "btn  btn-success btn-md mt-2" value="Enviar">
            </form>
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
        </div>

    </div>
@endsection
