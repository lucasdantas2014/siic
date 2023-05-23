<?php

use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProblemaController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])
    ->name('professor_dashboard');

Route::get('/dashboard/relatorio', [\App\Http\Controllers\AuthController::class, 'relatorio'])
    ->name('professor_relatorio');
