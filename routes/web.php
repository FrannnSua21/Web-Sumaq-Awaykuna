<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Ya existente, verifica que apunte a tu vista dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// NUEVO — el hub de módulos
Route::get('/modulos-administrativos', function () {
    return view('modulos-administrativos');
});

// Reutiliza la vista de Control de Diseño y Producción
Route::get('/produccion', function () {
    return view('control-diseno-produccion');
});

// Reutiliza la vista de Catálogo de Diseños
Route::get('/productos', function () {
    return view('catalogo-diseno');
});
