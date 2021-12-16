<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use App\Models\JenisPelanggaran;
use App\Models\DetailPelanggaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function dashboard()
	{
        return view('dashboard');
	}

    public function tabel_siswa()
    {
        $siswas = Siswa::get();

        return view('tabel_siswa', compact(['siswas', $siswas]));
    }

    public function tabel_pelanggaran()
    {
        $pelanggarans = DB::table('siswas')
        ->join('pelanggarans', 'siswas.nis', '=', 'pelanggarans.nis')
        ->select('siswas.*', 'pelanggarans.total_poin')
        ->get();

        return view('tabel_pelanggaran', compact(['pelanggarans', $pelanggarans]));
    }
    
    public function tabel_jenis(Request $req)
    {
        $jenis_pelanggarans = JenisPelanggaran::get();

        return view('tabel_jenis', compact(['jenis_pelanggarans', $jenis_pelanggarans]));
    }

    public function cari_siswa(Request $req)
    {
        $siswas =  DB::table('siswas')
        ->where('nama_siswa','like',"%".$req->cari."%")
        ->get();

        return view('tabel_siswa', compact(['siswas', $siswas]));
    }

    public function cari_pelanggaran(Request $req)
    {
        $pelanggarans = DB::table('siswas')
        ->join('pelanggarans', 'siswas.nis', '=', 'pelanggarans.nis')
        ->select('siswas.*', 'pelanggarans.total_poin')
        ->where('siswas.nama_siswa','like',"%".$req->cari."%")
        ->get();

        return view('tabel_pelanggaran', compact(['pelanggarans', $pelanggarans]));
    }

    public function cari_jenis(Request $req)
    {
        $jenis_pelanggarans = DB::table('jenis_pelanggarans')->where('nama_pelanggaran','like',"%".$req->cari."%")->get();

        return view('tabel_jenis', compact(['jenis_pelanggarans', $jenis_pelanggarans]));
    }

    public function get_info($nis)
    {
        View::share('nis2', $nis);
        $siswa = Siswa::where('nis', $nis)->get()->first();
        $pelanggaran = Pelanggaran::where('nis', $nis)->get()->first();
        $detail_pelanggaran = DetailPelanggaran::where('nis', $nis)->paginate(3);

        return view('personal', compact(['siswa', $siswa], ['pelanggaran', $pelanggaran], ['detail_pelanggaran', $detail_pelanggaran]));
    }

    public function tabel_info($nis2)
    {
        $siswa = Siswa::where('nis', $nis2)->get()->first();
		$pelanggaran = Pelanggaran::where('nis', $nis2)->get()->first();
		$detail_pelanggaran = DetailPelanggaran::where('nis', $nis2)->get();

		return view('tabel_info', compact(['siswa', $siswa], ['pelanggaran', $pelanggaran], ['detail_pelanggaran', $detail_pelanggaran]));
    }
}
