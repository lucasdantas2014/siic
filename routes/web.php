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

Route::get("/",[UserController::class, 'homePage'])->name('home_page');

// Login
Route::get('/login', [AuthController::class, 'loginPage'])->name('login_page');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/custom-registration', [AuthController::class, 'customRegistration'])->name('register');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

// Retorna página de primeiro login
Route::get('/firstlogin',[AuthController::class,'firstloginIndex'])->middleware('App\Http\Middleware\Authenticate');
Route::get('custom-firstlogin',[AuthController::class,'customFirstLogin']);

// Logout
Route::get('logout',[AuthController::class,'signOut'])->name('logout')->middleware('App\Http\Middleware\Authenticate');
// ################################ PÁGINAS ###########################################

// Retorna dashboard geral - USUARIO COMUM ou ADMIN
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('usuariopedidos',[UsuarioController::class,'index'])->middleware('App\Http\Middleware\Authenticate')->name('usuariopedidos');

// PÁGINA DE USUÁRIO COMUM

Route::get('pedidosusuariocomum',[PedidoController::class, 'pedidosUsuarioComum'])->middleware('App\Http\Middleware\Authenticate')->name('pedidosusuariocomum');
Route::get('trocarsenhaIndex',[AuthController::class,'trocarSenhaIndex'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhaIndex');
Route::get('trocarsenhastore',[AuthController::class,'trocarSenhaStore'])->middleware('App\Http\Middleware\Authenticate')->name('trocarsenhastore');

// PÁGINA PÚBLICA
Route::get("buscacategoria",[UserController::class,'buscaCategoria'])->name('buscacategoria');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
