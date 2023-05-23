<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatorio de Reservas</title>

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">--}}

</head>
<body>

<div id="cabecalho">
    <div class="row">

        <h1 class="col-md-12">Relatório de reservas</h1>

        <p class="col-md-12 mb-2">Relatório das reservas ocorreidas entre 01/02/2003 à 10/02/2023</p>

    </div>
</div>
<div id="table-registros">

    <div class="row">

        <table id="table-registros" class="table">
            <thead class="thead-dark">
            <tr>
                <th class="col-md-3">Hora empréstimo</th>
                <th class="col-md-3">Chave</th>
                <th class="col-md-3">Local</th>
                <th class="col-md-3">Hora devolução</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                {{--                        {{ json_encode($pedido) }}--}}
                <tr>
                    <td> {{ \Carbon\Carbon::parse($pedido['created_at'])->format('d/m/Y H:i:s') }} </td>
                    <td> {{ $pedido['chave']['nome'] }} </td>
                    <td> {{ $pedido['chave']['sala']['nome'] }} </td>
                    <td> {{ \Carbon\Carbon::parse($pedido['devolvido_em'])->format('d/m/Y H:i:s') ?? '-' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
<style>

    body {
        padding: 50px;
    }
    #cabecalho {
        text-align: center;
    }

    #table-registros {
        text-align: center;
        margin: auto;
        border-collapse: collapse;
    }

    #table-registros thead {
        background-color: #04AA6D;
    }

    table, td, th {
        border: 1px solid;
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #e1e1e1;
    }


</style>
</html>
