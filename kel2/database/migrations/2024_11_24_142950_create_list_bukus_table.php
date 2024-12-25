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
        Schema::create('list_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->string('sipnosis');
            $table->string('nama_penulis');
            $table->string('nama_penerbit');
            $table->date('tgl_rilis');
            $table->string('halaman');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_bukus');
    }
};
