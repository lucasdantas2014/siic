@extends('layouts.admin')

@section('conteudo')
    <div class="container border" >
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
            <div class = "col">
                <!-- LOGIN -->
                <a  href="{{route('admin_dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
            </div>
            <div class = "col">
                <!-- Adicionar chave -->
                <a  href="{{route('adicionarchave')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Adicionar chave</a>
            </div>
        </div>
    </div>

    <livewire:dynamic-table-chaves />


@endsection()

