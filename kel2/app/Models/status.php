<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory;

    public function riwayat_naskah(): HasMany
    {
        return $this->hasMany(riwayat_naskah::class);
    }
}
