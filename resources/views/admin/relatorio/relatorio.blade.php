@extends('layouts.admin')

@section('conteudo')

<div id="div-relatorios" class="mt-3 mb-4">
    <div class="row">
        <h2 class="col-4">Gerar Relatórios</h2>
    </div>

    <div id="div-form" class="row">

        <form action="{{ route('admin_relatorio_reserva') }}" method="POST">
            @csrf
            <div class="row">

                <div class="col-md-3 form-group">
                    <h5 class="mt-4 fw-bold">Filtrar pela data de empréstimo</h5>
                    <div class="mt-4 form-group">
                        <label>Data início: </label>
                        <input type="date" class="form-control form-control-lg" name="data-inicio-emprestimo" placeholder="Data de início"/>
                    </div>
                    <div class="mt-4 form-group">
                        <label>Data Fim: </label>
                        <input type="date" class="form-control form-control-lg" name="data-fim-emprestimo" placeholder="Data de fim"/>
                    </div>
                </div>

                <div class="col-md-3">
                    <h5 class="mt-4 fw-bold">Filtrar pela data de devolução</h5>
                    <div class="mt-4 form-grouo">
                        <label>Data início: </label>
                        <input type="date" class="form-control form-control-lg" name="data-inicio-devolucao" placeholder="Data de início"/>
                    </div>
                    <div class="mt-4 form-group">
                        <label>Data Fim: </label>
                        <input type="date" class="form-control form-control-lg" name="data-fim-devolucao" placeholder="Data de fim"/>
                    </div>
                </div>

                <div class="col-md-3">
                    <h5 class="mt-4 fw-bold h-vazio">.</h5>

                    <div class="mt-4 form-group">
                        <h5 class="mt-4 fw-bold">Filtrar pela chaves</h5>
                        <select name="chave" class="form-control form-control-lg div-form-select">
                            <option value="">Todas as Chaves</option>
                            @foreach($chaves as $chave)
                                <option value="{{ $chave->id }}"> {{ $chave->nome }} - {{ $chave->sala->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5 class="mt-4 fw-bold">Filtrar por categoria de sala</h5>
                    <select name="categoria" id ="categoria" class="form-control form-control-lg div-form-select">
                        <option selected value = "">Todas as Categorias</option>

                        @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                            <option value="{{ $categoria }}"> {{ $categoria }} </option>
                        @endforeach
                    </select>
                </div>


                <div class="row">

                    <div class="mt-4 col-md-3">
                        <h5 class="mt-4 fw-bold">Filtrar por usuário</h5>
                        <div class="form-group">
                            <label>SIAPE</label>
                            <input type="text" class="form-control form-control-lg" name="user_siape" placeholder="Sipae do usuário"/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success mt-4 form-control-lg">
                            Enviar
                        </button>

                    </div>
                </div>
            </div>
        </form>
    </div>

    <style>
        #div-relatorios {
            padding: 20px;
            color: #3EA14E;
            font-family: Roboto-Bold, serif;
        }

        #div-form {
            color: #000;
        }

        #div-form form {
            width: 100%;
            font-size: 14px;
        }

        #div-form span {
            font-family: Roboto-Bold, serif;
            margin-bottom: 20px;
        }

        #div-form input {
            border: 1px solid #000000;
            background-color: #FFFFFF;
            width: 100%;
        }

        .div-form-select {
            border: 1px solid #000000;
            background-color: #FFFFFF;
            width: 100%;
        }

        #div-form label {
            float: left;
        }

        #div-form button {
            background-color: #3EA14E;
            color: #FFFFFF;
            width: 100%;
        }

        .h-vazio {
            color: #F6F5F4;
        }
    </style>
@endsection

