<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ChaveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProblemaController;

use App\Http\Middleware\AdminCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return redirect('/siic/painel');
})->name('home_page');

Route::get("/painel",[UserController::class, 'homePage'])->name('painel');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login_page');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/custom-registration', [AuthController::class, 'customRegistration'])->name('register');
Route::post('signout', [AuthController::class, 'signOut'])->name('signout');

// Retorna página de primeiro login
Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');
Route::get('custom-firstlogin',[AuthController::class,'customFirstLogin']);

// Logout
Route::get('logout',[AuthController::class,'signOut'])->name('logout')->middleware('App\Http\Middleware\Authenticate');
// ################################ PÁGINAS ###########################################

// Retorna dashboard geral - USUARIO COMUM ou ADMIN
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


// PÁGINA DE USUÁRIO COMUM

Route::get('pedidosusuariocomum',[PedidoController::class, 'pedidosUsuarioComum'])->middleware('App\Http\Middleware\Authenticate')->name('pedidosusuariocomum');
Route::get('trocarsenhaIndex',[AuthController::class,'trocarSenhaIndex'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhaIndex');
Route::get('trocarsenhastore',[AuthController::class,'trocarSenhaStore'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhastore');

// PÁGINA PÚBLICA
Route::get("buscacategoria",[UserController::class,'buscaCategoria'])->name('buscacategoria');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTES ADMIN
Route::middleware(['admin'])->group(function () {
    Route::group(['prefix' => 'servidor'], function() {

        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin_dashboard');

        Route::get('trocarSenhaUsuário',[UserController::class,'trocarSenhaUsuario'])->middleware('App\Http\Middleware\Authenticate')->name('trocarSenhaUsuario');
        Route::get('storeTrocaSenha',[UserController::class,'storeTrocaSenha'])->middleware('App\Http\Middleware\Authenticate')->name('storeTrocaSenha');

        // Retorna página de registro - (PROVISÓRIA, APENAS PARA FAZER TESTES)
        Route::get('registration', [AuthController::class, 'registration'])->middleware('App\Http\Middleware\Authenticate')->name('registration');

        Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');

        //Route::get('logout',[AuthController::class,'signOut'])->name('logout')->middleware('App\Http\Middleware\Authenticate');

        //Route::get('usuariopedidos',[UsuarioController::class,'index'])->middleware('App\Http\Middleware\Authenticate')->name('usuariopedidos');


        // Retorna página de login pré-empréstimo
        Route::get('emprestimos', [PedidoController::class, 'index'])->name('admin_emprestimos');
        // Faz o login pré-pedido e retorna para uma página para completar o empréstimo caso o usuário tenha fornecido informações corretas
        Route::post('login-emprestimo', [PedidoController::class, 'loginEmprestimo'])->name('admin_login_emprestimo');
        // Registra as informações no banco
        Route::post('registrar-emprestimo', [PedidoController::class, 'registrarEmprestimo'])->name('admin_registrar_emprestimo');


        // MONITORAMENTO DE CHAVES - ADMIN

        Route::get('chaves',[ChaveController::class,'index'])->name('admin_chaves');
        Route::get('adicionarchave',[ChaveController::class,'adicionarPage'])->name('adicionarchave');


        Route::post('chaves/cadastrar', [ChaveController::class, 'store'])->name('admin_chaves_cadastrar');
        Route::get('chaves/editar/{nome}',[ChaveController::class,'editarChavePage'])->name('admin_chaves_editar_page');
        Route::post('chaves/editar',[ChaveController::class,'editarChave'])->name('admin_chaves_editar');
        Route::get('chaves/alterar-status/{nome}',[ChaveController::class,'alterarStatus'])->name('admin_chaves_alterar_status');

        Route::get('chaves/remover/{nome}',[ChaveController::class,'removerChave'])->name('admin_chaves_remover');

        // MONITORAMENTO DE USUÁRIOS

        Route::get('usuarios',[UserController::class,'index'])->name('admin_usuarios');
        Route::get('usuarios/cadastrar',[UserController::class,'cadastrarUsuarioPage'])->name('admin_usuarios_cadastrar_page');
        Route::post('usuarios/cadastrar',[UserController::class,'cadastrarUsuario'])->name('admin_usuarios_cadastrar');
        Route::get('usuarios/detalhes',[UserController::class,'detalhesDoUsuarioPage'])->name('admin_usuarios_detalhes');

        // Editar Usuario
        Route::get('usuarios/editar/{siape}',[UserController::class,'editarUsuarioPage'])->name('admin_usuarios_editar_page');
        Route::post('usuarios/editar',[UserController::class,'editarUsuario'])->name('admin_usuarios_editar');

        Route::get('usuarios/remover/{siape}', [UserController::class, 'removerUsuario'])->name('admin_usuarios_remover');

        // MONITORAMENTO DE DEVOLUÇÕES
        Route::get('devolucao',[PedidoController::class,'devolucaoIndex'])->name('admin_devolucao');
        Route::post('registrar-devolucao',[PedidoController::class,'registrarDevolucao'])->name('admin_registrar_devolucao');



        // RELATÓRIOS DE PEDIDOS
        Route::get('verpedidos',[PedidoController::class,'pedidosIndex'])->name('verpedidos');

        Route::get('pedidosusuario',[PedidoController::class,'pedidosUsuarioIndex'])->name('pedidosusuario');
        Route::get('respostausuario',[PedidoController::class,'respondeUsuario'])->name('respostausuario');

        Route::get('pedidosperiodo',[PedidoController::class,'pedidosPeriodoIndex'])->name('pedidosperiodo');
        Route::get('respostaperiodo',[PedidoController::class,'respondePeriodo'])->name('respostaperiodo');

        Route::get('pedidoschave',[PedidoController::class,'pedidosChaveIndex'])->name('pedidoschave');
        Route::get('respostachave',[PedidoController::class,'respondeChave'])->name('respostachave');

        Route::get('salas', [SalaController::class, 'index'])->name('admin_salas');
        Route::get('salas/cadastrar',[SalaController::class,'cadastrarPage'])->name('admin_salas_cadastrar_page');
        Route::post('salas/cadastrar', [SalaController::class, 'store'])->name('admin_salas_cadastrar');
        Route::get('salas/editar/{nome}',[SalaController::class,'editarPage'])->name('admin_salas_editar_page');
        Route::post('salas/editar',[SalaController::class,'editar'])->name('admin_salas_editar');
        Route::get('salas/alterar-status/{nome}',[SalaController::class,'alterarStatus'])->name('admin_salas_alterar_status');
        Route::get('salas/remover/{nome}',[SalaController::class,'remover'])->name('admin_salas_remover');

        Route::get('relatorios', [AdminController::class, 'relatoriosPage'])->name('admin_relatorios');
        Route::post('relatorios/reservas', [AdminController::class, 'gerarRelatorioPedidos'])
            ->name('admin_relatorio_reserva');


        Route::get('buscar-chaves-por-categoria',[PedidoController::class,'buscarChavesPorCategoria'])->name('admin_buscar_chaves_por_categoria');
        // RELATÓRIO DE PROBLEMAS
        Route::get('indexProblemas',[PedidoController::class,'indexProblemas'])->name('indexProblemas');
        // Deletar problema
        Route::get('deleteProblema/{problema_excluir}',[PedidoController::class,'deleteProblema'])->name('deleteProblema');
    });

});


// ROUTE USUARIO

Route::middleware(['user'])->group(function () {
    Route::group([], function() {


        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('tecnico_dashboard');

        Route::get('/reservas', [PedidoController::class, 'reservasDoUsuario'])
            ->name('tecnico_reservas');

        Route::get('/problemas', [ProblemaController::class, 'show'])
            ->name('tecnico_problemas');

        Route::get('/problemas/resolver/{problema}', [ProblemaController::class, 'resolverProblema'])
            ->name('tecnico_problema_resolver');

        Route::get('/problemas/registrar', [ProblemaController::class, 'registrarProblemaPage'])
            ->name('tecnico_problema_registrar_page');

        Route::post('/problemas/registrar', [ProblemaController::class, 'registrarProblema'])
            ->name('tecnico_problema_registrar');


        Route::get('/relatorios', [PedidoController::class, 'relatorio'])
            ->name('tecnico_relatorios');

        Route::post('/relatorio/reservas', [PedidoController::class, 'gerarRelatorioPedidos'])
            ->name('tecnico_relatorio_reserva');
    });
});
