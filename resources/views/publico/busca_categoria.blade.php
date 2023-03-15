<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <!-- CABEÇALHO -->
    <div class="container-fluid"  id = "header" style = "background-color:rgb(217,217,217);">
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-4 d-flex flex-row align-items-center">
                <img src="IFPB ícone cis.png" class = "p-1" style = "height:60px ;width:55px">
                <h2 class="ml-4" >Sistema Chaves IF</h2>
            </div>

            <div class="col-4 d-flex flex-row align-items-center">
                <a href="{{route('login')}}" style = "font-size: 3vh;" class="ml-5"></a>
            </div>
            <div class="col-2">
                <a href="index.html" style = "font-size: 3vh;" class="ml-5">Contato</a>
            </div>
            <div class="col-2">
                <a href="{{route('login')}}" style = "font-size: 3vh;" class="ml-5">Login</a>
            </div>
    
        </div>
    </div>
    <!-- CORPO -->


    <div class="row justify-content-center align-items-center g-2">
        <!-- LISTA DE PEDIDOS -->
        <div class="col d-flex flex-column align-items-center">
            <!-- TÍTULO -->
                <h1 class = 'px-5 py-3'>Laboratórios Ativos -  Categoria {{$categoria}}</h1>
            <!-- BUSCA -->
                <form action="buscacategoria" method="get" class = "mt-3">
                                <label for="categoria" class = "mr-1"><h5>Busque por categoria:</h5></label>

                                <select name="categoria" id = "categoria">
                                    <option value="Sala de Aula">Sala de Aula</option>
                                    <option value="Mineração">Mineração</option>
                                    <option value="Física">Física</option>
                                    <option value="Matematica">Matemática</option>
                                    <option value="Linguagens e Códigos">Linguagens e Códigos</option>
                                    <option value="Biologia">Biologia</option>
                                    <option value="Humanas">Humanas</option>
                                    <option value="Ginásio">Ginásio</option>
                                    <option value="Petróleo e Gás">Petróleo e Gás</option>
                                    <option value="Informática">Informática</option>
                                    <option value="Quimíca">Química</option>
                                    <option value="Ambiente Administrativo">Ambiente Administrativo</option>
                                    <option value="Construção de Edifícios">Construção de Edifícios</option>
                                </select>
                                <input type="submit" value="Buscar" class = 'ml-1'>
            </form>
            <!-- LISTA -->
            <div class="container pt-4">
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col-2">Categoria</th>
                                <th scope="col">Chave</th>
                                <th scope="col">Hora Início</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <th>{{$pedido->chave->categoria}}</td>
                                    <td>{{$pedido->chave->nomelab}}</td>
                                    <td>{{$pedido->created_at}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <!-- <div class="row justify-content-center align-items-center g-2"> -->
    <!-- <form action="buscacategoria" method="get">
                        <label for="">Busque por categoria</label>

                        <select name="categoria">
                            <option value="Sala de Aula">Sala de Aula</option>
                            <option value="Mineração">Mineração</option>
                            <option value="Física">Física</option>
                            <option value="Matematica">Matemática</option>
                            <option value="Linguagens e Códigos">Linguagens e Códigos</option>
                            <option value="Biologia">Biologia</option>
                            <option value="Humanas">Humanas</option>
                            <option value="Ginásio">Ginásio</option>
                            <option value="Petróleo e Gás">Petróleo e Gás</option>
                            <option value="Informática">Informática</option>
                            <option value="Quimíca">Química</option>
                            <option value="Ambiente Administrativo">Ambiente Administrativo</option>
                            <option value="Construção de Edifícios">Construção de Edifícios</option>
                        </select>
                        <input type="submit" value="Enviar">
                    </form> -->
        <!-- LISTA DE PEDIDOS -->
        <!-- <div class="col">
            <div class="row justify-content-center align-items-center g-2">
                <div class= "col">
                    <h2 class = 'px-5 py-3'>Laboratórios ativos - Categoria {{$categoria}}</h2>
                    <div class = 'px-5 py-3'>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Categoria</th>
                                <th scope="col">Chave</th>
                                <th scope="col">Hora Início</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                    <tr>
                                        <th>Informatica</td>
                                        <td>{{$pedido->chave->nomelab}}</td>
                                        <td>{{$pedido->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>  
                </div>
            </div>
        </div>
    </div> -->

</body>
</html>