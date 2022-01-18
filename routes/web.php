<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\SocioController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\ActaReunionController;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/empleado', function () {
    return view('gestion_de_usuarios_asistencia_y_actas.empleado.index');
});

Route::resource('empleado', EmpleadoController::class);
Auth::routes();

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
