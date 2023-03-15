<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devolução - Sistema de chaves</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
    <!-- CABEÇALHO -->
    <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">   
            <div class="row" style = "width:100%;">
                <div class = "col-2">
                    <img src="logo_campus.png" class = "p-3">
                </div>
                <div class = "col-3 offset-5">
                    <h1 class = "mt-4">Sistema de chaves</h1>
                </div>
            </div>
        <!-- LISTA DE OPÇÕES -->
        <div class="row align-items-center justify-content-center" style = "background-color:#dff0d8; width:998px;height:12vh;">
            <div class = "col">
                <!-- LOGIN -->
                <a  href="{{route('dashboard')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Início</a>
            </div>
            <div class = "col">
                <!-- Logout -->
                <a  href="{{route('logout')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> Sair</a>
            </div>
        </div>
    </div>
    <!-- CORPO -->
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12 m-2 text-center">

            <h3 class="m-3" >Devolução</h3>
            <!-- CORPO -->
            <div class="container" style = "width:998px">
            <!-- FORMULÁRIO DE DEVOLUÇÃO -->
            <form action="storedevolucao" class = "d-flex align-items-center flex-column" method="get">  
            <div class="form-group d-flex flex-row">
                    <select id = "categoria" name="categoria" class = "form-control-lg mr-4">
                            <option value="#" selected>Selecione a categoria da chave</option>
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

                    <select id = "laboratorios" name="nomechave" class = "form-control-lg">
                        <option value="#" selected>Selecione a chave</option>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>    
                        <script type = "text/javascript">
                        $(document).ready(function(){
                            $(document).on('change','#categoria',function(){
                                var cat_id = $(this).val();
                                var div = $(this).parent();
                                var op = " ";
                                console.log(cat_id);
                                $.ajax({
                                    type:"get",
                                    url:"{!!URL::to('encontraLabs')!!}",
                                    data:{'categoria':cat_id},
                                    success:function(data){
                                       for(var i = 0;i<data.length;i++){
                                            op+= '<option value = "'+ data[i].nomelab+'">'+ data[i].nomelab +'</option>';
                                       }
                                       div.find("#laboratorios").html(" ");
                                        div.find("#laboratorios").append(op);
                                    }

                                })
                            })
                        })
                    </script>
                    </select>
                </div>
            
           
                <label for="chave" class="form-label mt-3"><h5>Digite o SIAPE da pessoa que devolveu essa chave:</h5></label>
                <input name="keyusuario" id="keyusuario" class="form-control" style = "width:20rem;">

                <label for="chave" class="form-label mt-3"><h5>Se você tiver visto algum problema no laboratório, digite aqui (opcional): </h5></label>
                <textarea style = "width:20rem;" class = "mb-3 form-control" rows = "3" name="problema" placeholder = "Faça a descrição aqui"></textarea>
            
            <input type="submit" class = "btn btn-success btn-md mt-4" value="Devolver">
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif
            </form>

            </div>
        </div>
    </div>
    
</body>
</html>