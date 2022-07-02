<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAction']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/register', [AuthController::class, 'register'])->name('admin.register');
    Route::post('/register', [AuthController::class, 'registerAction']);

    Route::get('/{slug}/links', [AdminController::class, 'pageLinks'])->name('admin.links');
    Route::get('/{slug}/newlink', [AdminController::class, 'newLink'])->name('admin.newlink');
    Route::post('/{slug}/newlink', [AdminController::class, 'newLinkAction']);

    Route::get('/{slug}/editlink/{id}', [AdminController::class, 'pageLinks'])->name('admin.editlink');
    Route::get('/{slug}/dellink/{id}', [AdminController::class, 'pageLinks'])->name('admin.destroylink');


    Route::get('/{slug}/design', [AdminController::class, 'pageDesign'])->name('admin.design');
    Route::get('/{slug}/stats', [AdminController::class, 'pageStats'])->name('admin.stats');

    Route::get('/linkorder/{linkid}/{pos}', [AdminController::class, 'linkOrderUpdate']);
});

Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');

Route::fallback(function () {
    return view('notfound');
});
