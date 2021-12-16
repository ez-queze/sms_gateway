<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Siswa extends Model
{
    use HasFactory;
    use Searchable;

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'angkatan',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'nama_wali',
        'telp_wali',
    ];
}
