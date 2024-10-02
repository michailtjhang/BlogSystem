<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

// Route
Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/', [AuthController::class, 'auth_login'])->name('auth.login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'auth_register'])->name('auth.register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Resource Route
    Route::resource('category', CategoryController::class)
        ->only(['index', 'store', 'update', 'destroy']);
    Route::resource('article', ArticleController::class);
});
