<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    use HasFactory;
    const KATEGORI = ["Mikro","Kecil","Menengah"];

    protected $fillable = ["nama","pemilik","alamat","telepon","jenis_usaha","tanggal_pendirian","deskripsi"];
}
