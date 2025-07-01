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

// Registro de nuevos usuarios
Route::post('register', [AuthController::class, 'register'])
    ->name('auth.register');


// ── TODAS LAS DEMÁS RUTAS REQUIEREN AUTENTICACIÓN ───────────────────────────────────

Route::middleware(IsUserAuth::class)->group(function () {
    // Información del propio usuario
    Route::get('user', [AuthController::class, 'getUser'])
        ->name('auth.user');

    // Cerrar sesión
    Route::post('logout', [AuthController::class, 'logout'])
        ->name('auth.logout');
    
    // Rutas de elementos (requieren autenticación)
    Route::apiResource('categorias-elementos', ElementoController::class);

    // Rutas apiResource protegidas para los nuevos controladores bajo el grupo de autenticación
    Route::apiResource('municipios', App\Http\Controllers\MunicipioController::class);
    Route::apiResource('sedes', App\Http\Controllers\SedeController::class);
    Route::apiResource('areas', App\Http\Controllers\AreaController::class);
    Route::apiResource('programas', App\Http\Controllers\ProgramaController::class);
    Route::apiResource('modulos', App\Http\Controllers\ModuloController::class);
    Route::apiResource('tipo-materiales', App\Http\Controllers\TipoMaterialController::class);
    Route::apiResource('materiales', App\Http\Controllers\MaterialController::class);
    Route::apiResource('caracteristicas', App\Http\Controllers\CaracteristicaController::class);
    Route::apiResource('tipos-sitio', App\Http\Controllers\TipoSitioController::class);
    Route::apiResource('sitios', App\Http\Controllers\SitioController::class);
    Route::apiResource('inventarios', App\Http\Controllers\InventarioController::class);
    Route::apiResource('tipos-movimiento', App\Http\Controllers\TipoMovimientoController::class);
    Route::apiResource('movimientos', App\Http\Controllers\MovimientoController::class);
    Route::apiResource('fichas', App\Http\Controllers\FichaController::class);
    Route::apiResource('permisos', App\Http\Controllers\PermisoController::class);

    // ── Subgrupo: sólo administradores pueden modificar elementos y gestionar usuarios ────────────
    Route::middleware(IsAdmin::class)->group(function () {
        // Rutas de elementos para administradores
        Route::post('categorias-elementos', [ElementoController::class, 'store'])
            ->name('categorias-elementos.store');
        Route::get('categorias-elementos/{elemento}', [ElementoController::class, 'show'])
            ->name('categorias-elementos.show');
        Route::put('categorias-elementos/{elemento}', [ElementoController::class, 'update'])
            ->name('categorias-elementos.update');
        Route::delete('categorias-elementos/{elemento}', [ElementoController::class, 'destroy'])
            ->name('categorias-elementos.destroy');
            
        // Gestión de usuarios (solo admin)
        Route::apiResource('usuarios', UsuarioController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
        
        // Gestión de roles (solo admin)
        Route::apiResource('roles', RolController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    });
});
