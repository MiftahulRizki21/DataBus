<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class naskah extends Model
{
    /** @use HasFactory<\Database\Factories\NaskahFactory> */
    use HasFactory;

    public function editor(): BelongsTo
    {
        return $this->belongsTo(editor::class)->withDefault();
    }

    public function penulis(): BelongsTo
    {
        return $this->belongsTo(penulis::class)->withDefault();
    }

    public function riwayat_editor(): HasMany
    {
        return $this->hasMany(riwayat_editor::class);
    }

    public function riwayat_naskah(): HasMany
    {
        return $this->hasMany(riwayat_naskah::class);
    }
}
