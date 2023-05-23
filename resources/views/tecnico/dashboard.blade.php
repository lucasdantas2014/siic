@extends('layouts.professor')


@section('conteudo')
<div>
    <div class = "container text-center">
        <img src="Logotipo_IFET.svg" class = "m-5" style = "width:20%;height:20%;">
    </div>

    <!-- Código HTML da página -->

<!-- Verifica se a sessão flash existe e exibe o modal -->
    @if (session('mensagem') ?? session('mensagemDevolucao') ?? session('mensagemTroca') ?? session('mensagemRegistro') ?? session('mensagemLaboratorio'))
        <div class="modal fade" id="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="modalMensagemLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center">
                        <img src="Certo.png" style = "width:40%;height:40%">
                        @if(session('mensagem'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagem') }}</h5>
                            <p style = "color:black"><strong>Laboratório:  </strong>{{session('dados')->chave->nomelab}}</p>
                            <p style = "color:black"><strong>Usuário:  </strong>{{session('dados')->user->nome}}</p>
                        @endif

                        @if(session('mensagemDevolucao'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagemDevolucao') }}</h5>
                        @endif
                        @if(session('mensagemTroca'))
                            <h5 class = "mt-2 mb-4" >{{ session('mensagemTroca') }}</h5>
                        @endif

                        @if(session('mensagemRegistro'))
                            <h5 class = "mt-2 mb-4">{{session('mensagemRegistro')}}</h5>
                        @endif
                        @if(session('mensagemLaboratorio'))
                            <h5 class = "mt-2 mb-4">{{session('mensagemLaboratorio')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Ativa o modal automaticamente -->
        <script>
            $(document).ready(function() {
                $('#modalMensagem').modal('show');
            });
        </script>
    @endif

</div>
@endsection
