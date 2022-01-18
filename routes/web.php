<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ActaReunionController;
use App\Http\Controllers\HomeController;


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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
