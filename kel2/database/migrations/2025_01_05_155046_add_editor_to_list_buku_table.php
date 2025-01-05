<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('list_bukus', function (Blueprint $table) {
            $table->unsignedBigInteger('editor_id')->nullable()->after('foto');
            $table->unsignedBigInteger('staff_id')->nullable()->after('editor_id');
    
            // Tambahkan foreign key jika diperlukan
            $table->foreign('editor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('list_bukus', function (Blueprint $table) {
            $table->dropForeign(['editor_id']);
            $table->dropForeign(['staff_id']);
            $table->dropColumn(['editor_id', 'staff_id']);
        });
    }
    

};
