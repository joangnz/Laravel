<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;

// Rutas públicas (No requieren token)
Route::post('/register', [AuthController::class, 'register']); // Registro
Route::post('/login', [AuthController::class, 'login']); // Login

// Rutas protegidas (Requieren token)
Route::middleware('auth:sanctum')->group(function () {
    // Rutas para el controlador de usuario
    Route::post('/logout', [AuthController::class, 'logout']); // Logout
    Route::get('/me', [AuthController::class, 'me']); // Obtener datos del usuario autenticado

    // Rutas para el controlador de cursos
    Route::get('/courses', [CourseController::class, 'index']); // Obtener todos los cursos
    Route::post('/courses', [CourseController::class, 'store']); // Crear un nuevo curso
    Route::get('/courses/{id}', [CourseController::class, 'show']); // Obtener un curso específico
    Route::put('/courses/{id}', [CourseController::class, 'update']); // Actualizar un curso específico
    Route::delete('/courses/{id}', [CourseController::class, 'destroy']); // Eliminar un curso específico

    // Rutas para el controlador de asignaturas
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::post('/subjects', [SubjectController::class, 'store']);
    Route::get('/subjects/{id}', [SubjectController::class, 'show']);
    Route::put('/subjects/{id}', [SubjectController::class, 'update']);
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);
});
