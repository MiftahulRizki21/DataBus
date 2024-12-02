<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailBuku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul_buku',
        'sinopsis',
        'nama_penulis',
        'nama_penerbit',
        'tgl_rilis',
        'halaman',
        'foto',
        'editor',
        'media',
        'isbn'
    ];
}
