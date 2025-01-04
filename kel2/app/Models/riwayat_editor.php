<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class riwayat_editor extends Model
{
    /** @use HasFactory<\Database\Factories\RiwayatEditorFactory> */
    use HasFactory;

    public function editor(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
    public function pengajuan(): BelongsTo
    {
        return $this->belongsTo(pengajuan::class)->withDefault();
    }
}
