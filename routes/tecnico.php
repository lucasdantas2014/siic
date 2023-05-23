<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProblemaController;
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


Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('tecnico_dashboard');

Route::get('/reservas', [PedidoController::class, 'reservasDoUsuario'])
    ->name('tecnico_reservas');

Route::get('/problemas', [ProblemaController::class, 'show'])
    ->name('tecnico_problemas');

Route::get('/problemas/{problema}', [ProblemaController::class, 'resolverProblema'])
    ->name('tecnico_problema_resolver');

Route::get('/relatorios', [PedidoController::class, 'relatorio'])
    ->name('tecnico_relatorios');

Route::post('/relatorio/reservas', [PedidoController::class, 'gerarRelatorioPedidos'])
    ->name('tecnico_relatorio_reserva');
