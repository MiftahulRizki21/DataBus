<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class editor extends Model
{
    /** @use HasFactory<\Database\Factories\EditorFactory> */
    use HasFactory;

    public function riwayat_editor(): HasMany
    {
        return $this->hasMany(riwayat_editor::class);
    }
    
    public function staff_pustaka(): HasMany
    {
        return $this->hasMany(staff_pustaka::class);
    }
    
    public function verifikasi(): HasMany
    {
        return $this->hasMany(verifikasi::class);
    }
    
    public function naskah(): HasMany
    {
        return $this->hasMany(naskah::class);
    }

    
}
