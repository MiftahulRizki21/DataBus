<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBuku extends Model
{
    /** @use HasFactory<\Database\Factories\ListBukuFactory> */
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'sipnosis',
        'nama_penulis',
        'nama_penerbit',
        'tgl_rilis',
        'halaman',
        'foto',
        'file',
        'status',
        'ISBN',
    ];
    
}
