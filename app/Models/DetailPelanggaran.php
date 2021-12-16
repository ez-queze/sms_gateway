<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class DetailPelanggaran extends Model
{
    use HasFactory;
    use Searchable;

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
