<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    const KATEGORI = ['Makanan', 'Minuman', 'Rumah Tangga', 'Elektronik', 'Bayi', 'Kopi'];

    protected $table ="produks";

    protected $fillable = ["nama","kategori","stok","produk","bahan","harga","slug","deskripsi","gambar"];
}
