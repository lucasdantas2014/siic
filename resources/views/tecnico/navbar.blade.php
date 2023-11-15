
<nav class="navbar">
        <div id="div-logo-navbar">
            <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo_ifpb.png') }} alt="" alt="">
        </div>

        <div id="menu" class="mt-4">

            <ul class="nav navbar-nav">
                <li class="nav-item {{ \Illuminate\Support\Facades\Route::is('tecnico_reservas') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tecnico_reservas') }}">
                        <img src={{
                                \Illuminate\Support\Facades\Route::is('tecnico_reservas') ?
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/reservas_branco.png') :
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/reservas.png') }} alt="" alt="">
                        Reservas
                    </a>
                </li>

                <li class="nav-item {{ \Illuminate\Support\Facades\Route::is('tecnico_problemas') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tecnico_problemas') }}">
                        <img src={{
                                \Illuminate\Support\Facades\Route::is('tecnico_problemas') ?
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/problemas_branco.png') :
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/problemas.png') }} alt="" alt="">
                        Problemas
                    </a>
                </li>

                <li class="nav-item {{ \Illuminate\Support\Facades\Route::is('tecnico_relatorios') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tecnico_relatorios') }}">
                        <img src={{
                                \Illuminate\Support\Facades\Route::is('tecnico_relatorios') ?
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/relatorio_branco.png') :
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/relatorio.png') }} alt="" alt="">
                        Relatórios
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">
                        <img src={{
                                \Illuminate\Support\Facades\Vite::asset('resources/images/vectors/sair.png') }} alt="" alt="">
                        Sair
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

    .navbar {
        height: 100%;
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
