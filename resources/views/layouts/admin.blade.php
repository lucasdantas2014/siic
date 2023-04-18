<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Sistema de Chaves</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('custom-head')

</head>
<body>

    <div id="header" class="row">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('admin/logo_campus.png')}}">
            </div>
            <div class = "col-md-3">
                <h1 class = "mt-4">Sistema de chaves</h1>
            </div>
            <div class = "col-md-3">
                <a href="{{route('logout')}}">Sair</a>
            </div>

        </div>

    </div>

{{--    <div id="header" >--}}
{{--        <div class="row">--}}
{{--            <div>--}}
{{--                <img src={{asset('admin/logo_campus.png')}}>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row align-items-center justify-content-center">--}}

{{--            <div class = "col">--}}
{{--                <!-- USUÁRIOS -->--}}
{{--                <a  href="{{route('admin_usuarios')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">--}}
{{--                    <img src={{asset('admin/user.png')}}> Usuários--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class = "col">--}}
{{--                <a  href="{{route('admin_chaves')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border">--}}
{{--                    <img src={{asset('admin/chaves.png')}}> Chaves--}}
{{--                </a>--}}
{{--            </div>--}}

{{--            <div class = "col">--}}
{{--                <!-- EMPRÉSTIMO-->--}}
{{--                <a  href="{{route('admin_emprestimos')}}" class="btn btn-default border"> <img src={{asset('admin/emprestimo.png')}}>Empréstimo</a>--}}
{{--            </div>--}}

{{--            <div class = "col">--}}
{{--                <!-- DEVOLUÇÃO -->--}}
{{--                <a  href="{{route('admin_devolucao')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img src={{asset('admin/devolucao.png')}}>Devolução</a>--}}
{{--            </div>--}}

{{--            <div class = "col">--}}
{{--                <!-- RELATÓRIOS -->--}}
{{--                <a  href="{{route('verpedidos')}}" style = "background-color:#ffff;font-size:4vh;color:inherit;" class="btn btn-default border"> <img style = "width:5vh;height:5vh"  class = "mr-3" src={{asset('admin/history.png')}}>Relatórios</a>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


    @yield('conteudo')

    @include('layouts.footer')
</body>
<style>
    #header {}
</style>
</html>
