<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Aktifkan event scheduler
        DB::statement('SET GLOBAL event_scheduler = ON;');

        // Buat event untuk memperbarui status, editor_id, dan batas_pengeditan
        DB::statement("
            CREATE EVENT update_status_diajukan
            ON SCHEDULE EVERY 1 HOUR
            DO
            BEGIN
                UPDATE pengajuans
                SET 
                    status = 'Diajukan',
                    editor_id = NULL,
                    batas_pengeditan = NULL,
                    updated_at = NOW()
                WHERE 
                    batas_pengeditan < NOW()
                    AND status = 'Sedang Direview'
                    AND editor_id IS NOT NULL;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Hapus event saat rollback
        DB::statement("DROP EVENT IF EXISTS update_status_diajukan;");
    }
};
