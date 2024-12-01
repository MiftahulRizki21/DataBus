<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class staff_pustaka extends Model
{
    /** @use HasFactory<\Database\Factories\StaffPustakaFactory> */
    use HasFactory;
    
    public function editor(): BelongsTo
    {
        return $this->belongsTo(editor::class)->withDefault();
    }
}
