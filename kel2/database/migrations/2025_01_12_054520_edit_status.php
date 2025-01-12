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
        Schema::table('pengajuans', function (Blueprint $table) {
            // Mengubah kolom batas_pengeditan menjadi tipe date
            $table->enum('status', (['Selesai Revisi', 'Diterima', 'Revisi', 'Ditolak', 'Sedang Direview', 'Diajukan']));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
