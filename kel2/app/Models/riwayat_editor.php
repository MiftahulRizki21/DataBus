<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class riwayat_editor extends Model
{
    /** @use HasFactory<\Database\Factories\RiwayatEditorFactory> */
    use HasFactory;

    protected $fillable = [
        'pengajuan_id', 'editor_id', 'status',
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
