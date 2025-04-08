<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('can:isAdmin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
});
