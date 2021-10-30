<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\JenisPelanggaran;
use App\Models\DetailPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BkController extends Controller
{
    public function tambah_siswa(Request $req) 
    {
        $siswas = Siswa::where('nis', $req->nis)->get('nis')->pluck('nis')->first();

        if ($siswas == $req->nis) {
            return back()->with('status', 'NIS Sudah Ada!');
        }

        $siswa = Siswa::create([
            'nis' => $req->nis,
            'nama_siswa' => $req->nama_siswa,
            'kelas' => $req->kelas,
            'angkatan' => $req->angkatan,
            'tgl_lahir' => $req->tgl_lahir,
            'jenis_kelamin' => $req->jk,
            'alamat' => $req->alamat,
            'nama_wali' => $req->nama_wali,
            'telp_wali' => $req->telp_wali,
        ]);

        return redirect()->back()->with('status', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function tambah_pelanggaran(Request $req) 
    {
        //
    }

    public function ubah_siswa(Request $req) 
    {
        $siswa = Siswa::where('nis', $req->nis)->update([
            'nama_siswa' => $req->nama_siswa,
            'kelas' => $req->kelas,
            'angkatan' => $req->angkatan,
            'tgl_lahir' => $req->tgl_lahir,
            'jenis_kelamin' => $req->jk,
            'alamat' => $req->alamat,
            'nama_wali' => $req->nama_wali,
            'telp_wali' => $req->telp_wali,
        ]);

        return redirect()->back()->with('status', 'Data Siswa Berhasil Ditambahkan!');
    }
}
