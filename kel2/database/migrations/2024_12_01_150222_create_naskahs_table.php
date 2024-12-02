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
        Schema::create('naskahs', function (Blueprint $table) {
            $table->id();
            $table->text('judul_naskah');
            $table->text('status_naskah');
            $table->date('tanggal_review_naskah');
            $table->foreignId('id_penulis');
            $table->foreignId('id_editor');
            $table->text('file');
            $table->integer('total_naskah');
            $table->text('kekurangan_naskah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naskahs');
    }
};
