<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("pemilik");
            $table->text("alamat");
            $table->string("telepon");;
            $table->enum("jenis_usaha", ["Mikro", "Kecil","Menengah"])->default("Mikro");
            $table->date("tanggal_pendirian");
            $table->text("deskripsi");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
