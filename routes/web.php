<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\ClienteController;


// Página de bienvenida
Route::get('/', function () {
    return redirect()->route('login');
});

// ==========================
// RUTAS DE AUTENTICACIÓN
// ==========================

// Mostrar login
Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->middleware('guest')
    ->name('login');

// Procesar login
Route::post('/login', [LoginController::class, 'login'])
    ->middleware('guest');

// Cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ==========================
// RUTAS DE REGISTRO
// ==========================

// Mostrar registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->middleware('guest')
    ->name('register');

// Procesar registro
Route::post('/register', [RegisterController::class, 'register'])
    ->middleware('guest');

// ==========================
// DASHBOARD
// ==========================

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')
    ->name('home');

// ==========================
// NEGOCIOS
// ==========================

Route::get('/negocios', [NegocioController::class, 'index'])
    ->middleware('auth')
    ->name('negocios.index');

// ==========================
// CLIENTES
// ==========================

// Listado
Route::get('/clientes', [ClienteController::class, 'index'])
    ->middleware('auth')
    ->name('clientes.index');

// Formulario
Route::get('/clientes/crear', [ClienteController::class, 'create'])
    ->middleware('auth')
    ->name('clientes.create');

// Guardar
Route::post('/clientes', [ClienteController::class, 'store'])
    ->middleware('auth')
    ->name('clientes.store');

// ==========================
// IMPORTAR (PRIMERO ANTES DE {cliente})
// ==========================

Route::post('/clientes/importar', [ClienteController::class, 'importar'])
    ->middleware('auth')
    ->name('clientes.importar');

// ==========================
// RUTAS CON ID
// ==========================

// Mostrar
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])
    ->middleware('auth')
    ->name('clientes.show');

// Editar
Route::get('/clientes/{cliente}/editar', [ClienteController::class, 'edit'])
    ->middleware('auth')
    ->name('clientes.edit');

// Actualizar
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])
    ->middleware('auth')
    ->name('clientes.update');

// Eliminar cliente
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])
    ->middleware('auth')
    ->name('clientes.destroy');

// Agregar nota
Route::post('/clientes/{cliente}/nota', [ClienteController::class, 'agregarNota'])
    ->middleware('auth')
    ->name('clientes.nota.store');

// Eliminar nota
Route::delete('/clientes/{cliente}/nota/{nota}', [ClienteController::class, 'destroyNota'])
    ->middleware('auth')
    ->name('clientes.notas.destroy');




