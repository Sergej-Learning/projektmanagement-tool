<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\HistoryController;

// Öffentliche Routen (ohne Auth)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Geschützte Routen (mit Auth Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Benutzerprofil und Logout
    Route::get('/me', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin-Routen (Nur Admin-User)
    Route::middleware('can:isAdmin')->group(function () {
        Route::apiResource('users', UserController::class);
    });

    // User & Admin Routen
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('reports', ReportController::class);
    Route::apiResource('histories', HistoryController::class);
});
