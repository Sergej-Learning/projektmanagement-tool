<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\HistoryController;

// Authentification routes
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('me', [AuthController::class, 'profile']);


// Auth Sanctum-Routes
Route::middleware('auth:sanctum')->group(function () {

    // Projects-Routes
    Route::resource('projects', ProjectController::class);

    // Reports-Routes
    Route::resource('reports', ReportController::class);

    // Tastks-Route
    Route::resource('tasks', TaskController::class);

    //History-Routes
    Route::resource('histories', HistoryController::class);

    //User-Routes
    Route::resource('users', UserController::class);
});
