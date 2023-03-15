<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ChaveController;
use App\Http\Controllers\UserController;
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


// ############################### AUTENTICAÇAO ######################################


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin_dashboard');

Route::get('trocarSenhaUsuário',[UserController::class,'trocarSenhaUsuario'])->middleware('App\Http\Middleware\Authenticate')->name('trocarSenhaUsuario');
Route::get('storeTrocaSenha',[UserController::class,'storeTrocaSenha'])->middleware('App\Http\Middleware\Authenticate')->name('storeTrocaSenha');

// Retorna página de registro - (PROVISÓRIA, APENAS PARA FAZER TESTES)
Route::get('registration', [AuthController::class, 'registration'])->middleware('App\Http\Middleware\Authenticate')->name('registration');

Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');

Route::get('logout',[AuthController::class,'signOut'])->name('logout')->middleware('App\Http\Middleware\Authenticate');

Route::get('usuariopedidos',[UsuarioController::class,'index'])->middleware('App\Http\Middleware\Authenticate')->name('usuariopedidos');


// Retorna página de login pré-empréstimo
Route::get('emprestimos', [PedidoController::class, 'index'])->name('admin_emprestimos');
// Faz o login pré-pedido e retorna para uma página para completar o empréstimo caso o usuário tenha fornecido informações corretas
Route::post('login-emprestimo', [PedidoController::class, 'loginEmprestimo'])->name('admin_login_emprestimo');
// Registra as informações no banco
Route::post('registrar-emprestimo', [PedidoController::class, 'salvarEmprestimo'])->name('admin_registrar_emprestimo');


// MONITORAMENTO DE CHAVES - ADMIN

Route::get('chaves',[ChaveController::class,'index'])->name('admin_chaves');
Route::get('storechave',[ChaveController::class,'store'])->name('storechave');
Route::get('adicionarchave',[ChaveController::class,'indexAdicionar'])->name('adicionarchave');
Route::get('detalhechave',[ChaveController::class,'indexDetalhes'])->name('detalhechave');
Route::get('labscategoria',[ChaveController::class,'labsCategoria'])->name('labscategoria');

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
Route::get('devolucao',[PedidoController::class,'devolucaoIndex'])->name('devolucao');
Route::get('storedevolucao',[PedidoController::class,'storedevolucao'])->name('storedevolucao');

// RELATÓRIOS DE PEDIDOS
Route::get('verpedidos',[PedidoController::class,'pedidosIndex'])->name('verpedidos');

Route::get('pedidosusuario',[PedidoController::class,'pedidosUsuarioIndex'])->name('pedidosusuario');
Route::get('respostausuario',[PedidoController::class,'respondeUsuario'])->name('respostausuario');

Route::get('pedidosperiodo',[PedidoController::class,'pedidosPeriodoIndex'])->name('pedidosperiodo');
Route::get('respostaperiodo',[PedidoController::class,'respondePeriodo'])->name('respostaperiodo');

Route::get('pedidoschave',[PedidoController::class,'pedidosChaveIndex'])->name('pedidoschave');
Route::get('respostachave',[PedidoController::class,'respondeChave'])->name('respostachave');

Route::get('buscar-chaves-por-categoria',[PedidoController::class,'buscarChavesPorCategoria'])->name('admin_buscar_chaves_por_categoria');
// RELATÓRIO DE PROBLEMAS
Route::get('indexProblemas',[PedidoController::class,'indexProblemas'])->name('indexProblemas');
// Deletar problema
Route::get('deleteProblema/{problema_excluir}',[PedidoController::class,'deleteProblema'])->name('deleteProblema');


