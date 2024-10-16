<?php

use Illuminate\Support\Facades\Route;

Route::name('.')->group(function () {

    Route::resource('/user', App\Http\Controllers\Admin\UserController::class)->except(['show']);
    Route::post('/user/search', [App\Http\Controllers\Admin\UserController::class, 'search'])->name('user.search');
});
