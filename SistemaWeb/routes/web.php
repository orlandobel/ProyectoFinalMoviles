<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgrupamientoController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\UsuariosController;
use App\Models\Agrupamiento;

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

//-- Agrupamientos--//
Route::get('/agrupamientos', [AgrupamientoController::class, "index"])->name('agrupamientos')->middleware('auth');
Route::post('/grupo/nuevo',[AgrupamientoController::class,"createGrupo"])->name('creando')->middleware('auth');
Route::put('/grupo/agtualizar', [AgrupamientoController::class, "update"])->name('actualizar')->middleware('auth');
Route::delete('/grupo/delete/{id}',[AgrupamientoController::class, "deleteGrupo"])->name('eliminando_grupo')->middleware('auth');
Route::delete('/usuario/delete/{id}',[AgrupamientoController::class, "deleteUsuario"])->name('eliminando')->middleware('auth');

//-- Notficaciones --//
Route::get('/notificaciones', [NotificacionesController::class, 'index'])->name('notificaciones')->middleware('auth');
Route::post('/notificaciones/enviar', [NotificacionesController::class, 'enviar'])->name('enviar')->middleware('auth');

//-- Autenticaciones --//
Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::get('/auth', [UsuariosController::class, "login"])->name('auth');
Route::get('/logout', [UsuariosController::class, "logout"])->name('logout');
Route::post('/registro', [UsuariosController::class, "registro"])->name('registro');

