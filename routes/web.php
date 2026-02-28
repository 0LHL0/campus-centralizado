<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\HomeController;

// Ruta principal — carga el home cuando alguien entra a "/"
Route::get('/', [HomeController::class,'index'])->name('home');

// Ruta resource institutiones 
Route::resource('institutions', InstitutionController::class);
    
// Ruta resource para ciclos
Route::resource('cycles', CycleController::class);
