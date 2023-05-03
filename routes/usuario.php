<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/dashboard', [\App\Http\Controllers\AuthController::class, 'dashboard'])
    ->name('usuario_dashboard');
