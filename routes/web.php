<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');

Route::fallback(function(){
    return view('notfound');
});