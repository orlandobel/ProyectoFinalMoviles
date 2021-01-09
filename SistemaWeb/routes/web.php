<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/agrupamientos', function(){//agregando rutas para agrupamiento
    return view('agrupamientos');
})->name('agrupamientos');

Route::get('/notificaciones', function () {
    return view('notifications');
})->name('notificaciones');

Route::get('/', function () {
    return view('auth.login');
})->name('login');
