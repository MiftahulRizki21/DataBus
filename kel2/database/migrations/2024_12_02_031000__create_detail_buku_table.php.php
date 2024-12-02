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
        Schema::create('detail_bukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul_buku');
            $table->text('sinopsis');
            $table->string('nama_penulis');
            $table->string('nama_penerbit');
            $table->date('tgl_rilis');
            $table->integer('halaman');
            $table->string('editor');
            $table->string('media');
            $table->string('isbn', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bukus');
    }
};
