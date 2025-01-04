<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan extends Model
{
    /** @use HasFactory<\Database\Factories\PengajuanFactory> */
    use HasFactory;
    protected $guarded = [];

    public function nextStep()
    {
        switch ($this->status) {
            case 'tidak diterima':
                return 'Arahkan ke editor';
            case 'diterima':
                return 'Arahkan ke staff';
            case 'revisi':
                return 'Arahkan kembali ke user dari editor';
            case 'ditolak':
                return 'Pengajuan kembali ke user dan tidak dapat diubah';
            default:
                return 'Status tidak valid';
        }
    }
}
