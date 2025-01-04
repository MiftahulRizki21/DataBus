<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanFactory> */
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
        'user_id', // Pastikan ini ada
        'editor_id',
        'staff_id'
    ];

    // public function nextStep()
    // {
    //     switch ($this->status) {
    //         case 'tidak diterima':
    //             return 'Arahkan ke editor';
    //         case 'diterima':
    //             return 'Arahkan ke staff';
    //         case 'revisi':
    //             return 'Arahkan kembali ke user dari editor';
    //         case 'ditolak':
    //             return 'Pengajuan kembali ke user dan tidak dapat diubah';
    //         default:
    //             return 'Status tidak valid';
    //     }
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }
}
