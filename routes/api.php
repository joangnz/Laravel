<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CalendarEventController;

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

    // Rutas para el controlador de tareas
    Route::get('/assignments', [AssignmentController::class, 'index']);
    Route::post('/assignments', [AssignmentController::class, 'store']);
    Route::get('/assignments/{id}', [AssignmentController::class, 'show']);
    Route::put('/assignments/{id}', [AssignmentController::class, 'update']);
    Route::delete('/assignments/{id}', [AssignmentController::class, 'destroy']);

    // Rutas para el controlador de entregas
    Route::get('/submissions', [SubmissionController::class, 'index']);
    Route::post('/submissions', [SubmissionController::class, 'store']);
    Route::get('/submissions/{id}', [SubmissionController::class, 'show']);
    Route::get('/submissions/{id}', [SubmissionController::class, 'update']);
    // Route::delete('/submissions/{id}', [SubmissionController::class, 'destroy']);

    // Rutas para el controlador de eventos del calendario
    Route::get('/calendar', [CalendarEventController::class, 'index']);
    Route::post('/calendar', [CalendarEventController::class, 'store']);
    Route::get('/calendar/{id}', [CalendarEventController::class, 'show']);
    Route::put('/calendar/{id}', [CalendarEventController::class, 'update']);
    Route::delete('/calendar/{id}', [CalendarEventController::class, 'destroy']);
});
