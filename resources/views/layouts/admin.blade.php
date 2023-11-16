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
    <div id="div-main" class="row">
        <div id="div-navbar" class="col-md-2">
            @include('admin.navbar')
        </div>
        <div id="div-conteudo" class="col-md-10">
            @yield('conteudo')
        </div>
        <div id="div-footer" class="col-md-12">
            @include('layouts.footer_verde')
        </div>

    </div>

    @livewireScripts
</body>
<style>

    body {
        background-color: #F6F5F4;
        height: 100vh;
        overflow: hidden;
    }

    #div-main {
        height: 100%;
    }

    #div-navbar {
        height: 100%;
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
        border: 1px solid #3EA14E;

    }

    .botao-verde:hover {
        background-color: #FFFFFF !important;
        color: #3EA14E !important;
        border: 1px solid #3EA14E;
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

    .opcoes button {
        background-color: inherit;
        border: solid 0 #F6F5F4;
    }

    .pagination > li > a,
    .pagination > li > span {
        color: #3EA14E; // use your own color here
    }

    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover {
        background-color: #3EA14E;
        border-color: #3EA14E;
    }

    .page-item button{
        color: #3EA14E !important;
    }

    nav {
        height: fit-content;
    }

    @media(max-width: 425px){
        body {
            background-color: #F6F5F4;
            height: 100vh;
            overflow: scroll;
            font-size: 13px;
        }

        .container {
            height: fit-content;
        }

        #div-navbar {
            height: fit-content;
            width: 100%;
        }

        #div-login-link {
            display: revert;
        }

        #div-footer {
            padding: 0;
        }
    }
</style>
</html>
