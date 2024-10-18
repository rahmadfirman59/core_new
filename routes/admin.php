<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index']);
Route::name('.')->group(function () {

    Route::resource('/user', App\Http\Controllers\Admin\UserController::class)->except(['show']);
    Route::post('/user/search', [App\Http\Controllers\Admin\UserController::class, 'search'])->name('user.search');

    Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class)->except(['show']);
    Route::post('/slider/search', [App\Http\Controllers\Admin\SliderController::class, 'search'])->name('user.search');

    Route::get('/profil/sambutan', [App\Http\Controllers\Admin\ProfilController::class, 'sambutan'])->name('profil.sambutan');
    Route::put('/profil/sambutan/{id}', [App\Http\Controllers\Admin\ProfilController::class, 'save_sambutan'])->name('profil.sambutan.save');

});
