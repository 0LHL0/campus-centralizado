<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CycleController;

// Ruta principal — carga el home cuando alguien entra a "/"
Route::get('/', function () {
    return view('home');
})->name('home');

// Ruta resource 
Route::resource('institutions', InstitutionController::class);

// Ruta resource para ciclos
Route::resource('cycles', CycleController::class);