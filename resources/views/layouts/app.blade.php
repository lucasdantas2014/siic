<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="div-main" class="row">
        <div id="div-conteudo" class="col-md-10">
            @yield('conteudo')
        </div>
        <div id="div-footer" class="col-md-12">
            @include('layouts.footer')
        </div>

    </div>

    @livewireScripts

    <style>

        body {
            background-color: #F6F5F4;
            height: 100vh;
            overflow: hidden;
        }

        #div-main {
            height: 100%;
            margin: 0;
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

            #div-login-link {
                display: revert;
            }

            #div-footer {
                padding: 0;
            }
        }
    </style>
</body>
</html>
