<table class="table">
    <thead>
    <tr class="row">
        <th class="col-md-2" scope="col">Chave</th>
        <th class="col-md-2" scope="col">Sala</th>
        <th class="col-md-2" scope="col">Descrição</th>
        <th class="col-md-2" scope="col">Status</th>
        <th class="col-md-4" scope="col">Opções</th>
    </tr>
    </thead>
    <tbody>
    @foreach($chaves as $chave)
        <tr class="row">
            <td class="col-md-2">{{$chave->nome}}</td>
            <td class="col-md-2">{{$chave->sala->nome}}</td>
            <td class="col-md-2">{{$chave->descricao}}</td>
            <td class="col-md-2">@if($chave->disponivel == true)
                    <strong style = "color:green">Disponível!</strong>
                @endif
                @if($chave->disponivel == false)
                    <strong style = "color:red">Indisponível!</strong>
                @endif
            </td>
            <td class="col-md-4">
                <ul class="lista-opcoes">
                    <li class="opcoes">
                        <a href="{{ route("admin_chaves_editar_page", $chave->nome) }}">
                            <i class="bi bi-pen"></i> editar
                        </a>
                    </li>
                    <li class="opcoes opcoes_vermelho">
                        <a class="opcoes opcoes_vermelho" onclick="return confirm('Você tem certeza?')" href="{{route('admin_chaves_remover', $chave->nome)}}">
                            <i class="bi bi-trash3"></i> remover
                        </a>
                    </li>
                    <li class="opcoes opcoes_azul">
                        <a onclick="return confirm('Você tem certeza?')" href="{{route('admin_chaves_alterar_status', $chave->nome)}}">
                            <i class="bi bi-trash3"></i> alterar status
                        </a>
                    </li>
                </ul>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
