<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use Scribe\Laravel\Views\Scribe;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs', function () {
    return view('scribe.index');
});


Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');
