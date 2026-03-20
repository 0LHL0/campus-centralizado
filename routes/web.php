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
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ProfileController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/config', [ConfigController::class, 'index'])->name('config.index')->middleware('role:admin');

    Route::resource('institutions', InstitutionController::class)->middleware('role:admin');
    Route::resource('cycles', CycleController::class)->middleware('role:admin');
    Route::resource('classrooms', ClassroomController::class)->middleware('role:admin,profesor');
    Route::resource('students', StudentController::class)->middleware('role:admin,profesor');
    Route::resource('news', NewsController::class)->middleware('role:admin,profesor');
    Route::resource('messages', MessageController::class);
});
