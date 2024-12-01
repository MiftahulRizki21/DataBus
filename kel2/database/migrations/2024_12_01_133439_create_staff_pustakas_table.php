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
        Schema::create('staff_pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_staff');
            $table->string('email_staff_pustaka');
            $table->string('username');
            $table->string('password');
            $table->foreignId('id_editor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_pustakas');
    }
};
