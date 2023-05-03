<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ChaveController;
use App\Http\Controllers\TecnicoController;
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

Route::get('/reservas/{siape}', [PedidoController::class, 'reservasDoUsuario'])
    ->name('tecnico_reservas');
