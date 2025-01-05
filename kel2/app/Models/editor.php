<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class editor extends Model
{
    use HasFactory;

    public function pengajuan()
    {
        return $this->hasMany(pengajuan::class);
    }
}
