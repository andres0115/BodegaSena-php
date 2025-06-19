<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElementoController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUserAuth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolController;

// ── RUTAS PÚBLICAS (Sin autenticación) ────────────────────────────────────────

// Ruta de login - única ruta pública
Route::post('login', [AuthController::class, 'login'])
    ->name('auth.login');

// ── TODAS LAS DEMÁS RUTAS REQUIEREN AUTENTICACIÓN ───────────────────────────────────

Route::middleware(IsUserAuth::class)->group(function () {
    // Información del propio usuario
    Route::get('user', [AuthController::class, 'getUser'])
        ->name('auth.user');

    // Cerrar sesión
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('auth.logout');
    
    // Rutas de elementos (requieren autenticación)
    Route::get('elementos', [ElementoController::class, 'index'])
        ->name('elementos.index');

    // ── Subgrupo: sólo administradores pueden modificar elementos y gestionar usuarios ────────────
    Route::middleware(IsAdmin::class)->group(function () {
        // Rutas de elementos para administradores
        Route::post('elementos', [ElementoController::class, 'store'])
            ->name('elementos.store');
        Route::get('elementos/{elemento}', [ElementoController::class, 'show'])
            ->name('elementos.show');
        Route::put('elementos/{elemento}', [ElementoController::class, 'update'])
            ->name('elementos.update');
        Route::delete('elementos/{elemento}', [ElementoController::class, 'destroy'])
            ->name('elementos.destroy');
            
        // Registro de nuevos usuarios (solo admin)
        Route::post('register', [AuthController::class, 'register'])
            ->name('auth.register');
            
        // Gestión de usuarios (solo admin)
        Route::apiResource('usuarios', UsuarioController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
        
        // Gestión de roles (solo admin)
        Route::apiResource('roles', RolController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    });
});
