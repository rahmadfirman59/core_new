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

    Route::get('/profil/visi-misi', [App\Http\Controllers\Admin\ProfilController::class, 'visi_misi'])->name('profil.visi.misi');
    Route::put('/profil/visi-misi/{id}', [App\Http\Controllers\Admin\ProfilController::class, 'save_visi'])->name('profil.visi.misi.save');

    Route::get('/profil/sejarah', [App\Http\Controllers\Admin\ProfilController::class, 'sejarah'])->name('profil.sejarah');
    Route::put('/profil/sejarah/{id}', [App\Http\Controllers\Admin\ProfilController::class, 'save_sejarah'])->name('profil.sejarah.save');

    Route::get('/profil/pengurus', [App\Http\Controllers\Admin\ProfilController::class, 'pengurus'])->name('profil.pengurus');
    Route::put('/profil/pengurus/{id}', [App\Http\Controllers\Admin\ProfilController::class, 'save_pengurus'])->name('profil.pengurus.save');

    Route::get('/profil/program-kerja', [App\Http\Controllers\Admin\ProfilController::class, 'program_kerja'])->name('profil.program.kerja');
    Route::put('/profil/program-kerja/{id}', [App\Http\Controllers\Admin\ProfilController::class, 'save_program_kerja'])->name('profil.pengurus.save');



});
