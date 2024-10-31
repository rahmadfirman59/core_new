<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::middleware([])->group(__DIR__ . '/auth.php');

//Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('/');
Route::middleware(['auth', 'io'])->group(function () {

    Route::prefix('admin')->name('admin')->group(__DIR__ . '/admin.php');

//    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});
