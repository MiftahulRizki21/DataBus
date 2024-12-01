<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penulis extends Model
{
    /** @use HasFactory<\Database\Factories\PenulisFactory> */
    use HasFactory;

    public function verifikasi(): HasMany
    {
        return $this->hasMany(verifikasi::class);
    }

    public function naskah(): HasMany
    {
        return $this->hasMany(naskah::class);
    }

    public function riwayat_naskah(): HasMany
    {
        return $this->hasMany(riwayat_naskah::class);
    }
}
