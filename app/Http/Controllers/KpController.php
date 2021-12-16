<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\JenisPelanggaran;
use App\Models\DetailPelanggaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KpController extends Controller
{
	public function hapus_detail($id)
     {
		$nis = DetailPelanggaran::where('id', $id)->get('nis')->pluck('nis')->first();
		$total_poin_sebelumnya = Pelanggaran::where('nis', $nis)->get('total_poin')->first();
		$detail_pelanggaran = DetailPelanggaran::find($id);

		$total = $total_poin_sebelumnya->total_poin - $detail_pelanggaran->poin;

		Pelanggaran::where('nis', $nis)->update([
			'total_poin' => $total,
		]);

		$detail_pelanggaran->delete();

		return redirect('/dashboard/informasi/'.$nis)->with('Status', 'Data Berhasil Dihapus!');
     }
}
