<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chaves - Home</title>
    <!-- Arquivos botstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    </head>

<body style = "background-color:green">
    <div class="container bg-white mt-2 text-center">

        <!-- Corpo principal -->
        <!-- Cabeçalho -->
        <div class="row justify-content-center align-items-center g-2 border">
            <div class="col p-2"> <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Logotipo_IFET.svg/800px-Logotipo_IFET.svg.png" class = "w-25"></div></h1>
            <div class="col-8 text-center"><h1 style = "font-size:4rem">Sistema chaves IF</h1></div>
        </div>
        <!-- Cabeçalho de opções de interação com o banco -->
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-4">
                <div class="container border mt-2" data-bs-toggle="modal" data-bs-target="#modalChave">
                    <h3 class = "p-1 mb-3">Adicionar chave</h4>
                    <img class = "p-1"src="https://img.icons8.com/ios/50/null/key-security.png"/>
                </div>
            </div>
            <div class="col-4">
                <div class="container border mt-2" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                    <h3 class = "p-1">Adicionar usuário</h4>
                    <img class = "p-1"src="https://img.icons8.com/ios-filled/60/null/user.png"/>
                </div>
            </div>
            <div class="col-4">
                <div class="container border mt-2" data-bs-toggle="modal" data-bs-target="#modalFuncionario">
                    <h3 class = "p-1">Adicionar funcionário</h4>
                    <img class = "p-1" src="https://img.icons8.com/ios-glyphs/60/null/admin-settings-male.png"/>
                </div>
            </div>
        </div>

        <!-- Lista de laboratórios -->
        @foreach($laboratorios as $laboratorio)
        <div class="row justify-content-center align-items-center g-2 border mt-3">
            <div class="col">{{$laboratorio->nome}}</div>
            <div class="col">{{$laboratorio->chave}}</div>
            <div class="col">{{$laboratorio->disponivel}}</div>
            <div class="col-2"></div>
            <div class="col">Botão vermelho</div>
            <div class="col">Histórico</div>
            <div class="col">Devolução</div>
        </div>
        @endforeach



        <!-- Modais -->

        <!-- Modal - Adicionar Chave -->
        <div class="modal fade" id="modalChave" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Adicionar chave</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Formulário para adicionar a chave -->
                        <form action="/storechave" method="get">
                            <label >Nome do laboratório</label>
                            <input type="text" name = "nome">
                            <label >Nome da chave</label>
                            <input type="text" name = "nomechave">
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary"></button>
                        </form>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- Modal - Adicionar Usuário -->
        <div class="modal fade" id="modalUsuario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Adicionar Funcionário -->
        <div class="modal fade" id="modalFuncionario" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Body
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>