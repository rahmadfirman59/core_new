<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Umkm\HomeController::class, 'index']);

Route::name('.')->group(function () {
    Route::resource('/produk', App\Http\Controllers\Umkm\ProdukController::class)->except(['show']);
    Route::post('/produk/search', [App\Http\Controllers\Umkm\ProdukController::class, 'search'])->name('produk.search');
});
