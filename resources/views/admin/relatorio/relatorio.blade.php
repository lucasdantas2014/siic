@extends('layouts.admin')

@section('conteudo')

    <h3 class="mt-4">Relatórios</h3>
    <div id="main-div" class="row">
        <form class="form-control" action="{{ route('admin_relatorio_reserva') }}" method="POST">
            @method('POST')
            @csrf

            <div class="row">


            <div class="col-md-2">
                <h5 class="mt-4 fw-bold">Filtrar pela data de empréstimo</h5>
                <div class="input-group">
                    <label>Data início: </label>
                    <input type="date" class="input-group" name="data-inicio-emprestimo" placeholder="Data de início"/>
                </div>
                <div class="input-group">
                    <label>Data Fim: </label>
                    <input type="date" class="input-group" name="data-fim-emprestimo" placeholder="Data de fim"/>
                </div>
            </div>

            <div class="col-md-2">
                <h5 class="mt-4 fw-bold">Filtrar pela data de devolução</h5>
                <div class="input-group">
                    <label>Data início: </label>
                    <input type="date" class="input-group" name="data-inicio-devolucao" placeholder="Data de início"/>
                </div>
                <div class="input-group">
                    <label>Data Fim: </label>
                    <input type="date" class="input-group" name="data-fim-devolucao" placeholder="Data de fim"/>
                </div>
            </div>

            <div class="col-md-3 mr-2">
                <h5 class="mt-4 fw-bold">Filtrar pela chaves</h5>
                <select name="chave">
                    <option value="">Todas as Chaves</option>
                    @foreach($chaves as $chave)
                        <option value="{{ $chave->id }}"> {{ $chave->nome }} - {{ $chave->sala->nome }}</option>
                    @endforeach
                </select>

                <h5 class="mt-4 fw-bold">Filtrar por categoria de sala</h5>
                <select name="categoria" id ="categoria">
                    <option selected value = "">Todas as Categorias</option>

                    @foreach (App\Models\Sala::CATEGORIAS as $categoria)
                        <option value="{{ $categoria }}"> {{ $categoria }} </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3" style="margin-left: 65px">
                <h5 class="mt-4 fw-bold">Filtrar por usuário</h5>
                <div class="input-group">
                    <label>Siape: </label>
                    <input type="text" class="input-group" name="user_siape" placeholder="Sipae do usuário"/>
                </div>
            </div>

            <button type="submit" class="btn btn-success mt-4">
                Gerar Relatório
            </button>
            </div>
        </form>
    </div>

    <style>
        #main-div {
            width: 998px;
            margin: auto;
        }

        #main-div form {
            width: 100%;
        }
    </style>
@endsection

