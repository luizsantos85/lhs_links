<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'registerAction']);


    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');

Route::fallback(function () {
    return view('notfound');
});
