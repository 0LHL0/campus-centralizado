<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\AuthController;

// Rutas de autenticación — accesibles sin login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas — requieren estar autenticado
Route::middleware('auth')->group(function () {

    // Inicio y búsqueda — todos los roles
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // Instituciones — solo admin
    Route::resource('institutions', InstitutionController::class)
         ->middleware('role:admin');

    // Ciclos — solo admin
    Route::resource('cycles', CycleController::class)
         ->middleware('role:admin');

    // Salones — admin y profesor
    Route::resource('classrooms', ClassroomController::class)
         ->middleware('role:admin,profesor');

    // Estudiantes — admin y profesor
    Route::resource('students', StudentController::class)
         ->middleware('role:admin,profesor');

    // Noticias — admin y profesor
    Route::resource('news', NewsController::class)
         ->middleware('role:admin,profesor');

    // Mensajes — todos los roles
    Route::resource('messages', MessageController::class);
});
