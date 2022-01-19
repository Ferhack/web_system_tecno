<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ActaReunionController;
use App\Http\Controllers\AporteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultaController;
use App\Http\Controllers\IngresoController;

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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

// define all routes, to show routes execute: php artisan route:list
Route::resource('empleado', EmpleadoController::class);

Route::get('/socio', function () {
    return view('gestion_de_usuarios_asistencia_y_actas.socio.index');
});

Route::resource('socio', SocioController::class);
Auth::routes();

Route::get('/asistencia', function () {
    return view('gestion_de_usuarios_asistencia_y_actas.asistencia.index');
});

Route::resource('asistencia', AsistenciaController::class);

Route::get('/actaReunion', function () {
    return view('gestion_de_usuarios_asistencia_y_actas.actaReunion.index');
});

Route::resource('actaReunion', ActaReunionController::class);

// APORTE ROUTES
Route::get('/aporte', [AporteController::class, 'index']);

Route::get('/aporte/create', [AporteController::class, 'create']);

Route::post('/aporte', [AporteController::class, 'store']);

Route::get('/aporte/{id}/edit', [AporteController::class, 'edit']);

Route::post('/aporte/{id}/update', [AporteController::class, 'update']);

Route::post('/aporte/{id}/delete', [AporteController::class, 'destroy']);

// MULTA ROUTES
Route::get('/multa', [MultaController::class, 'index']);

Route::get('/multa/create', [MultaController::class, 'create']);

Route::post('/multa', [MultaController::class, 'store']);

Route::get('/multa/{id}/edit', [MultaController::class, 'edit']);

Route::post('/multa/{id}/update', [MultaController::class, 'update']);

Route::post('/multa/{id}/delete', [MultaController::class, 'destroy']);

// INGRESO ROUTE
Route::resource('ingreso', IngresoController::class);

// HOME ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
