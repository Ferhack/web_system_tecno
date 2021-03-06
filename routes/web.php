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
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\MultaSocioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AportePagoController;
use App\Http\Controllers\MultaPagoController;
use App\Http\Controllers\KardexController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\AsistenciaSocioController;

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

// EMPLEADO ROUTE
Route::resource('empleado', EmpleadoController::class);
Route::get('/empleado/{ci}/desactivar', [EmpleadoController::class, 'desactivar']);
Route::get('/empleado/{ci}/activar', [EmpleadoController::class, 'activar']);
// SOCIO ROUTE
Route::resource('socio', SocioController::class);
Route::get('/socio/{ci}/desactivar', [SocioController::class, 'desactivar']);
Route::get('/socio/{ci}/activar', [SocioController::class, 'activar']);

// ASISTENCIA ROUTE
Route::resource('asistencia', AsistenciaController::class);

// ACTA DE REUNION ROUTE
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

Route::get('/multa_socio/{id}', [MultaSocioController::class, 'index']);

Route::get('/multa_socio/create/{id}', [MultaSocioController::class, 'create']);

Route::post('/multa_socio/create/{id}', [MultaSocioController::class, 'store']);

Route::post('/multa_socio/{id}/delete/{id_multa}', [MultaSocioController::class, 'destroy']);

// INGRESO ROUTE
Route::resource('ingreso', IngresoController::class);

// EGRESO ROUTE
Route::resource('egreso', EgresoController::class);

// PAGO ROUTE
Route::resource('pago', PagoController::class);

Route::get('/aporte_pago/{nro_pago}', [AportePagoController::class, 'index']);
Route::get('/aporte_pago/{nro_pago}/create', [AportePagoController::class, 'create']);
Route::post('/aporte_pago/{nro_pago}/create', [AportePagoController::class, 'store']);
Route::delete('/aporte_pago/{nro_pago}/{id_aporte}', [AportePagoController::class, 'destroy']);

Route::get('/multa_pago/{nro_pago}', [MultaPagoController::class, 'index']);
Route::get('/multa_pago/{nro_pago}/create', [MultaPagoController::class, 'create']);
Route::post('/multa_pago/{nro_pago}/create', [MultaPagoController::class, 'store']);
Route::delete('/multa_pago/{nro_pago}/{id_multa}', [MultaPagoController::class, 'destroy']);

// KARDEX ROUTE
Route::get('/kardex/{ci_socio}', [KardexController::class, 'index']);

// REPORTE ROUTE
Route::get('/reporte_ingreso', [ReportesController::class, 'indexIngreso']);

Route::get('/reporte_egreso', [ReportesController::class, 'indexEgreso']);

// REPORTE ROUTE
Route::get('/asistencia_socio/{id}', [AsistenciaSocioController::class, 'index']);
Route::get('/asistencia_socio/create/{id}', [AsistenciaSocioController::class, 'create']);
Route::post('/asistencia_socio/create/{id}', [AsistenciaSocioController::class, 'store']);
Route::post('/asistencia_socio/{id}/delete/{id_asistencia}', [AsistenciaSocioController::class, 'destroy']);


// HOME ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

