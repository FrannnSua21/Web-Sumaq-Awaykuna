<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


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
| Catálogo de Diseños
|--------------------------------------------------------------------------
*/

Route::get('/productos', function () {
    return view('catalogo-diseno');
})->name('productos');





/////

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
