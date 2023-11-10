<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistema de Chaves</title>


    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @vite(['resources/css/admin.css'])
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    @yield('custom-head')

    @livewireStyles
</head>
<body>
    <div class="row">
        <div id="div-navbar" class="col-md-2">
            @include('admin.navbar')
        </div>
        <div id="div-conteudo" class="col-md-10">
            @yield('conteudo')
        </div>

        @include('layouts.footer_verde')
    </div>

    @livewireScripts
</body>
<style>

    body {
        background-color: #F6F5F4;
        height: 100vh;
        /*overflow: hidden;*/
    }

    #div-navbar {
        padding-right: 0;
    }

    #div-conteudo {
        padding-right: 0;
        padding-left: 0;
    }

    .botao-verde {
        background-color: #3EA14E;
        color: #FFFFFF !important;
        max-width: 200px;
        float: right;
        font-size: 14px !important;
        margin-right: 20px;

    }

    .botao-verde:hover {
        background-color: #FFFFFF !important;
        color: #3EA14E !important;
    }

    .botao-branco {
        background-color: #FFFFFF !important;
        color: #3EA14E !important;
        max-width: 200px;
        float: right;
        font-size: 14px !important;
        margin-right: 20px;
    }

    .botao-branco:hover{
        background-color: #3EA14E;
        color: #FFFFFF !important;
    }

    .botao-cinza {
        max-width: 200px;
        float: right;
        font-size: 14px !important;
        margin-right: 20px;
        background-color: #F6F5F4;
        color: #3EA14E;
        border: solid 1px #3EA14E;
    }

    .botao-cinza:hover {
        background-color: #3EA14E;
        color: #FFFFFF !important;
    }

    <style>

     #div-usuarios {
         color: #3EA14E;
         font-family: Roboto-Bold, serif;
     }

    #botao-adicionar-usuario {
        max-width: 200px;
        float: right;
        font-size: 14px !important;
        margin-right: 20px;
    }

    .opcoes {
        display: inline;
        list-style: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 13px;
    }

    .opcoes_vermelho {
        color: #A30D11 !important;
    }

    .opcoes a {
        text-decoration: none;
        color: #000;
    }

    #tabela-usuarios {
        background-color: #FFFFFF;
    }
</style>
</html>
