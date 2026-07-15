<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArtesanaController;


/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');


/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [LoginController::class, 'showLogin']
)->name('login');

Route::post(
    '/login',
    [LoginController::class, 'login']
)->name('login.process');

Route::post(
    '/logout',
    [LoginController::class, 'logout']
)->name('logout');

Route::get(
    '/register',
    [RegisterController::class, 'showRegister']
)->name('register');

Route::post(
    '/register',
    [RegisterController::class, 'register']
)->name('register.process');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| Módulos Administrativos
|--------------------------------------------------------------------------
*/

Route::get('/modulos-administrativos', function () {
    return view('modulos-administrativos');
})->name('modulos.administrativos');


/*
|--------------------------------------------------------------------------
| Producción
|--------------------------------------------------------------------------
*/

Route::get('/produccion', function () {
    return view('control-diseno-produccion');
})->name('produccion');


/*
|--------------------------------------------------------------------------
| Artesanas
|--------------------------------------------------------------------------
*/

Route::get(
    '/artesanas',
    [ArtesanaController::class, 'index']
)->name('artesanas');

Route::post(
    '/artesanas',
    [ArtesanaController::class, 'store']
)->name('artesanas.store');


/*
|--------------------------------------------------------------------------
| Productos / Catálogo
|--------------------------------------------------------------------------
| Una sola definición por ruta con nombre. Antes existían varias rutas
| repetidas con el mismo name(), lo que hacía que Laravel usara la última
| registrada y el comportamiento fuera impredecible (por ejemplo, /productos
| a veces devolvía una vista distinta a la del controlador real).
*/

Route::get(
    '/productos',
    [ProductoController::class, 'index']
)->name('productos');

Route::get(
    '/productos/{id}',
    [ProductoController::class, 'show']
)->name('productos.detalle');

Route::post(
    '/productos',
    [ProductoController::class, 'store']
)->name('productos.store');

Route::put(
    '/productos/{id}',
    [ProductoController::class, 'update']
)->name('productos.update');

Route::delete(
    '/productos/{id}',
    [ProductoController::class, 'destroy']
)->name('productos.delete');


/*
|--------------------------------------------------------------------------
| Otros módulos
|--------------------------------------------------------------------------
*/

Route::get('/inventario', function () {
    return view('inventario');
})->name('inventario');

Route::get('/contabilidad', function () {
    return view('contabilidad');
})->name('contabilidad');

Route::get('/comunicados', function () {
    return view('comunicados');
})->name('comunicados');

Route::get('/archivos', function () {
    return view('archivos');
})->name('archivos');

Route::get('/junta', function () {
    return view('junta');
})->name('junta');


/*
|--------------------------------------------------------------------------
| Usuario
|--------------------------------------------------------------------------
*/

Route::get('/perfil', function () {
    return view('perfil');
})->name('perfil');

Route::get('/configuracion', function () {
    return view('configuracion');
})->name('configuracion');


use App\Http\Controllers\UsuarioController;

Route::get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');
Route::get('/configuracion', [UsuarioController::class, 'configuracion'])->name('configuracion');
Route::put('/configuracion', [UsuarioController::class, 'actualizarPerfil'])->name('configuracion.update');
