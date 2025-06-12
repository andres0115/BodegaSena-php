<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ElementoController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUserAuth;

// ── RUTAS PÚBLICAS ────────────────────────────────────────────────────────────



Route::post('login', [AuthController::class, 'login'])
    ->name('auth.login');

// Listado abierto de elementos
Route::get('elementos', [ElementoController::class, 'index'])
    ->name('elementos.index');


// ── RUTAS PROTEGIDAS (Usuario autenticado) ───────────────────────────────────

Route::middleware(IsUserAuth::class)->group(function () {
    // Información del propio usuario
    Route::get('user', [AuthController::class, 'getUser'])
        ->name('auth.user');

    // Cerrar sesión
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('auth.logout');

    // Refrescar token
    Route::post('refresh', [AuthController::class, 'refresh'])
        ->name('auth.refresh');

    // ── Subgrupo: sólo administradores pueden modificar elementos ────────────
    Route::middleware(IsAdmin::class)->group(function () {
        Route::post('elementos', [ElementoController::class, 'store'])
            ->name('elementos.store');
        Route::get('elementos/{elemento}', [ElementoController::class, 'show'])
            ->name('elementos.show');
        Route::put('elementos/{elemento}', [ElementoController::class, 'update'])
            ->name('elementos.update');
        Route::delete('elementos/{elemento}', [ElementoController::class, 'destroy'])
            ->name('elementos.destroy');
        Route::post('register', [AuthController::class, 'register'])
            ->name('auth.register');
    });
});
