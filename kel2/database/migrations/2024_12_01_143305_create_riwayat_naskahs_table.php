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
        Schema::create('riwayat_naskahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_naskah');
            $table->foreignId('id_penulis');
            $table->foreignId('id_status');
            $table->enum('status_riwayat_naskah', (['diterima', 'ditolak']));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_naskahs');
    }
};
