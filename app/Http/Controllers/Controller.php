<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\JenisPelanggaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function dashboard()
	{
		$siswas = Siswa::paginate(3);
		$pelanggarans = DB::table('siswas')
			->join('pelanggarans', 'siswas.nis', '=', 'pelanggarans.nis')
            	->select('siswas.*', 'pelanggarans.total_poin')
		  	->paginate(3);
		$jenis_pelanggarans = JenisPelanggaran::paginate(3);

		return view('dashboard', compact(['siswas', $siswas], ['pelanggarans', $pelanggarans], ['jenis_pelanggarans', $jenis_pelanggarans]));
	}
}
