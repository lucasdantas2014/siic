@extends('layouts.professor')

@section('conteudo')

    <div id="main-div" class="row">
        <form class="form-control" action="{{ route('tecnico_relatorio_reserva') }}" method="POST">
            @method('POST')
            @csrf

            <div class="row">


            <div class="col-md-3">
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

            <div class="col-md-3">
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

            <div class="col-md-3">
                <h5 class="mt-4 fw-bold">Filtrar pela chaves</h5>
                Implmentar seleção das chaves....

                <select name="chave">
                    <option value="">Selecione uma chave</option>
                    @foreach($chaves as $chave)
                        <option value="{{ $chave->id }}"> {{ $chave->nome }} - {{ $chave->sala->nome }}</option>
                    @endforeach
                </select>
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

