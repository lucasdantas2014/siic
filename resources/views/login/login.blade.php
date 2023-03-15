<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaves</title>
    <link rel="stylesheet" href="/css/styles.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container border"  id = "header" style = "width:998px;background-image:url(background.png);">   
        <div class="row" style = "width:100%;">
                <div class = "col-2">
                    <img src="logo_campus.png" class = "p-3">
                </div>
                <div class = "col-3 offset-5">
                    <h1 class = "mt-4">Sistema de chaves</h1>
                </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-8 text-center">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col"><h3 class = "p-5">Entrar</h3></div>
            </div>
            <div class="row justify-content-center align-items-center g-2">
                <div class="col">
                    <form method="POST" class = "d-flex justify-content-center align-items-center flex-column" action="{{ route('login.custom') }}">
                            @csrf
                                    <label for="siape"><h5>SIAPE</h5></label>
                                    <input type="text" width = "20rem" style = "width:20rem;" placeholder="Digite o seu número do SIAPE aqui" id="siape" class="form-control" name="siape" autofocus>
                                        @if ($errors->has('siape'))
                                            <span class="text-danger">{{ $errors->first('siape') }}</span>
                                        @endif 
                                    
                                    <label for="password" class = "mt-4"><H5>Senha</H5></label>
                                    <input type="password" style = "width:20rem;" placeholder="Digite a sua senha aqui:" id="password" class="form-control" name="password">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                        @if(session()->has('alert'))
                                           
                                               <p>{{ session()->get('alert') }}</p>
                                        
                                        @endif

                                <button type="submit" class="btn btn-success mt-4">Entrar</button>
                    </form>
            </div>
        </div>
    </div>

</body>
</html>