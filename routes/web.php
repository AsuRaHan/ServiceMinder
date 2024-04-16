<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\IndexController::class, 'home'])->name('home');

Route::prefix('admin')->group(function (){
    Route::get('/', [\App\Http\Controllers\admin\AdminController::class, 'index'])->name('admin.index');
    Route::get('{any}', [\App\Http\Controllers\admin\AdminController::class, 'index'])->where('any', '.*')->name('admin.all');
});


Route::prefix('posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
    Route::get('/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
});
Route::middleware('auth')->group(function () {
    Route::any('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'loginFormAction'])->name('login.form');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'registerFormAction'])->name('register.form');
});
