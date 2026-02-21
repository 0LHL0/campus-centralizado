<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;

// Ruta principal — carga el home cuando alguien entra a "/"
Route::get('/', function () {
    return view('home');
})->name('home');

// Ruta resource — genera automáticamente las 7 rutas para instituciones, institutions.index, institutions.create, institutions.store, etc.

Route::resource('institutions', InstitutionController::class);
