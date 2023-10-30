
<nav class="navbar">

{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#colp" aria-controls="colp" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="colp">--}}

        <div id="div-logo-navbar">
            <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo_ifpb.png') }} alt="" alt="">
        </div>

        <div id="menu" class="mt-4">

            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin_usuarios') }}">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/usuario_branco.png') }} alt="" alt="">
                        Usuários
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_salas') }}">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/sala.png') }} alt="" alt="">
                        Salas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_chaves') }}">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/chave.png') }} alt="" alt="">
                        Chaves
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_emprestimos') }}">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/emprestimo.png') }} alt="" alt="">
                        Empréstimo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin_devolucao') }}">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/devolucao.png') }} alt="" alt="">
                        Devolução
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link">
                        <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/relatorio.png') }} alt="" alt="">
                        Relatórios
                    </a>
                </li>
            </ul>
        </div>
</nav>

<style>
    nav {
        background-color: #FFFFFF;
        height: 100vh;
        align-content: flex-start;

        color: #3EA14E;
    }

    #div-logo-navbar {
        width: 100%;
        margin: 10px;
    }

    #div-logo-navbar img {
        width: 100%;
        height: auto;
    }

    #menu {
        width: 100%;
    }

    a {
        color: #3EA14E !important;
        font-family: Roboto-Black, serif;
    }

    .active {
        background-color: #3EA14E;
    }

    .active a{
        color: #fff !important;
    }

    li {
        padding: 5px;
    }

</style>
