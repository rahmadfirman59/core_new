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

    Route::resource('/produk', App\Http\Controllers\Admin\ProdukController::class)->except(['show']);
    Route::post('/produk/search', [App\Http\Controllers\Admin\ProdukController::class, 'search'])->name('produk.search');

    Route::resource('/kegiatan', App\Http\Controllers\Admin\KegiatanController::class)->except(['show']);
    Route::post('/kegiatan/search', [App\Http\Controllers\Admin\KegiatanController::class, 'search'])->name('kegiatan.search');

    Route::resource('/kategori', App\Http\Controllers\Admin\KategoriController::class)->except(['show']);
    Route::post('/kategori/search', [App\Http\Controllers\Admin\KategoriController::class, 'search'])->name('kategori.search');

    Route::resource('/sambutan', App\Http\Controllers\Admin\SambutanController::class)->except(['show']);
    Route::post('/sambutan/search', [App\Http\Controllers\Admin\SambutanController::class, 'search'])->name('sambutan.search');

    Route::resource('/visimisi', App\Http\Controllers\Admin\VisiMisiController::class)->except(['show']);
    Route::post('/visimisi/search', [App\Http\Controllers\Admin\VisiMisiController::class, 'search'])->name('visimisi.search');

    Route::resource('/sejarah', App\Http\Controllers\Admin\SejarahController::class)->except(['show']);
    Route::post('/sejarah/search', [App\Http\Controllers\Admin\SejarahController::class, 'search'])->name('sejarah.search');

    Route::resource('/pengurus', App\Http\Controllers\Admin\PengurusController::class)->except(['show']);
    Route::post('/pengurus/search', [App\Http\Controllers\Admin\PengurusController::class, 'search'])->name('pengurus.search');

    Route::resource('/program-kerja', App\Http\Controllers\Admin\ProgramKerjaController::class)->except(['show']);
    Route::post('/program-kerja/search', [App\Http\Controllers\Admin\ProgramKerjaController::class, 'search'])->name('program.kerja.search');

    Route::resource('/umkm', App\Http\Controllers\Admin\UmkmController::class)->except(['show']);
    Route::post('/umkm/search', [App\Http\Controllers\Admin\UmkmController::class, 'search'])->name('umkm.kerja.search');
});
