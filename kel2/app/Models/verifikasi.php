<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class verifikasi extends Model
{
    /** @use HasFactory<\Database\Factories\VerifikasiFactory> */
    use HasFactory;

    public function editor(): BelongsTo
    {
        return $this->belongsTo(editor::class)->withDefault();
    }

    public function naskah(): BelongsTo
    {
        return $this->belongsTo(naskah::class)->withDefault();
    }

    public function penulis(): BelongsTo
    {
        return $this->belongsTo(penulis::class)->withDefault();
    }


}
