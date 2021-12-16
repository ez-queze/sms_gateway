<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Pelanggaran extends Model
{
    use HasFactory;
    use Searchable;

    protected $primaryKey = 'nis';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'total_poin',
    ];
}
