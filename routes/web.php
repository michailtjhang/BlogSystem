<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\TwoFactorSettingsController;
use App\Http\Controllers\Front\HomeController;

// Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/article/search', [HomeController::class, 'index'])->name('search');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth_login'])->name('auth.login');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'auth_register'])->name('auth.register');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'verify2fa']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // Resource Route
        Route::resource('category', CategoryController::class)
            ->only(['index', 'store', 'update', 'destroy'])->middleware('useradmin:admin');
        Route::resource('user', UserController::class)
            ->only(['index', 'store', 'update', 'destroy']);
        Route::resource('article', ArticleController::class);

        Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    });
});

Route::get('/auth/redirect', [SocialiteController::class, 'redirect'])->name('auth.socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('auth.socialite.callback');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/two-factor', [TwoFactorController::class, 'index'])->name('two-factor.index');
    Route::post('/two-factor/verify', [TwoFactorController::class, 'verify'])->name('two-factor.verify');
    Route::post('/two-factor/enable', [TwoFactorSettingsController::class, 'enable'])->name('two-factor.enable');
    Route::post('/two-factor/disable', [TwoFactorSettingsController::class, 'disable'])->name('two-factor.disable');
});
