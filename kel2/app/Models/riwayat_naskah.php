<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class riwayat_naskah extends Model
{
    /** @use HasFactory<\Database\Factories\RiwayatNaskahFactory> */
    use HasFactory;

    public function status(): BelongsTo
    {
        return $this->belongsTo(status::class)->withDefault();
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
