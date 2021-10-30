<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'kategori',
        'nama_pelanggaran',
        'poin',
        'tanggal',
    ];
}
