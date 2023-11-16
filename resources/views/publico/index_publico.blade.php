<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Chaves - SIIC</title>

    @vite(['resources/css/admin.css'])
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    @yield('custom-head')

    @livewireStyles
</head>
<body>

    <div id="div-main" class="row">
        <div class="container offset-md-2 col-md-8">
            <div id="div-header" class="row">
                <div class="col-md-5">
                    <img src="logo_campus.png" class = "p-3">
                </div>
                <div id="div-titulo" class= "col-md-5">
                    <h1 class = "mt-4">SIIC - Sistema Interno Integrado de Chaves</h1>
                </div>
                <div id="div-login-link" class="col-md-2">
                    <a  id="a-login" href="{{route('login_page')}}"> Login</a>
                </div>
            </div>
            <div id="div-conteudo" class="row">
                <livewire:dynamic-table-publico />
            </div>
        </div>

        <div id="div-footer" class="col-md-12">
            @include('layouts.footer_verde')
        </div>

    </div>

    @livewireScripts
    <style>

        body {
            background-color: #F6F5F4;
            height: 100vh;
            overflow: hidden;
            font-size: 13px;
        }

        #div-main {
            height: 100%;
            width: 100%;
            margin: 0;
        }

        #div-header {
            background-image:url(background.png);
            margin: 0;
        }

        .container {
            background-color: #fff;
            height: 100%;
            padding: 0;
        }

        #div-titulo {
            align-items: center;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }

        #div-login-link {
            display: flex;
            text-align: right;
            font-weight: bolder;
        }

        #a-login {
            text-decoration: none;
            color: #5f5757f0;
            font-size: 20px
        }

        #div-conteudo {
            width: 100%;
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
