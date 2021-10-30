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
        'angkatan',
        'semester',
        'kode_pelanggaran',
        'nama_pelanggaran',
        'poin',
        'tanggal',
    ];
}
