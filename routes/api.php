<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\InstitutionApiController;
use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\ClassroomApiController;

// Ruta pública — login para obtener token
Route::post('/login', [AuthApiController::class, 'login']);

// Rutas protegidas — requieren token de Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Logout
    Route::post('/logout', [AuthApiController::class, 'logout']);

    // Instituciones
    Route::apiResource('institutions', InstitutionApiController::class);

    // Estudiantes
    Route::apiResource('students', StudentApiController::class);

    // Noticias
    Route::apiResource('news', NewsApiController::class);

    // Aulas
    Route::apiResource('classrooms', ClassroomApiController::class);

});
