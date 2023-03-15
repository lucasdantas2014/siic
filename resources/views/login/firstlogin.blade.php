<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Chaves</title>

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

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-8 text-center">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col p-5">
                    <h1 class = "mb-5">Cadastre sua nova senha!</h1>
                <form action="/custom-firstlogin" method="get" class = "form-control-lg p-3">
                    <input type="text" name="senhanova" id="senhanova">
                    <input type="submit" value="Enviar" class = "btn btn-success">
                </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
