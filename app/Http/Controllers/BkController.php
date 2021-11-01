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

		$pelanggaran = Pelanggaran::create([
			'nis' => $req->nis,
			'nama_siswa' => $req->nama_siswa,
			'total_poin' => 0,
		]);

		return redirect()->back()->with('status', 'Data Siswa Berhasil Ditambahkan!');
	}

	public function get_siswa($nis)
	{
		$siswa = Siswa::where('nis', $nis)->get()->first();

		return view('ubah_siswa', compact('siswa', $siswa));
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

		return redirect()->route('dashboard')->with('status', 'Data Siswa Berhasil Diubah!');
	}

	public function get_pelanggaran($nis)
	{
	    $siswa = Siswa::where('nis', $nis)->get()->first();
	    $berpakaian = JenisPelanggaran::where('kategori', 'Berpakaian')->get();
	    $belajar = JenisPelanggaran::where('kategori', 'Belajar')->get();
	    $sikap = JenisPelanggaran::where('kategori', 'Sikap / Norma')->get();
	    $kategori = JenisPelanggaran::get('kategori')->pluck('kategori')->unique();

	    return view('tambah_pelanggaran', compact(['siswa', $siswa], ['berpakaian', $berpakaian], ['belajar', $belajar], ['sikap', $sikap], ['kategori', $kategori]));
	}

	public function tambah_pelanggaran(Request $req)
	{
		$berpakaian = JenisPelanggaran::where('kategori', 'Berpakaian')->get();
		for ($i=0; $i < count($berpakaian); $i++) {
			$nama_berpakaian[] = JenisPelanggaran::where('kategori', $req['kategori-0'])->where('nama_pelanggaran', $req['berpakaian-'.$i])->get('nama_pelanggaran')->pluck('nama_pelanggaran')->first();
			$poin_berpakaian[] = JenisPelanggaran::where('kategori', $req['kategori-0'])->where('nama_pelanggaran', $req['berpakaian-'.$i])->get('poin')->pluck('poin')->first();
		}

 	     $belajar = JenisPelanggaran::where('kategori', 'Belajar')->get();
		for ($i=0; $i < count($belajar); $i++) {
			$nama_belajar[] = JenisPelanggaran::where('kategori', $req['kategori-1'])->where('nama_pelanggaran', $req['belajar-'.$i])->get('nama_pelanggaran')->pluck('nama_pelanggaran')->first();
			$poin_belajar[] = JenisPelanggaran::where('kategori', $req['kategori-1'])->where('nama_pelanggaran', $req['belajar-'.$i])->get('poin')->pluck('poin')->first();
		}

 	     $sikap = JenisPelanggaran::where('kategori', 'Sikap / Norma')->get();
		for ($i=0; $i < count($sikap); $i++) {
			$nama_sikap[] = JenisPelanggaran::where('kategori', $req['kategori-2'])->where('nama_pelanggaran', $req['sikap-'.$i])->get('nama_pelanggaran')->pluck('nama_pelanggaran')->first();
			$poin_sikap[] = JenisPelanggaran::where('kategori', $req['kategori-2'])->where('nama_pelanggaran', $req['sikap-'.$i])->get('poin')->pluck('poin')->first();
		}

		$total_poin_sebelumnya = Pelanggaran::where('nis', $req->nis)->get('total_poin')->pluck('total_poin')->first();

		for ($i=0; $i < count($berpakaian); $i++) {
			if ($nama_berpakaian[$i] != null) {
				$detail_pelanggaran = DetailPelanggaran::create(
					[
						'nis' => $req->nis,
						'nama_siswa' => $req->nama_siswa,
						'kelas' => $req->kelas,
						'kategori' => $req['kategori-0'],
						'nama_pelanggaran' => $nama_berpakaian[$i],
						'poin' => $poin_berpakaian[$i],
					]
				);
			}else {
				continue;
			}
		}

		for ($i=0; $i < count($belajar); $i++) {
			if ($nama_belajar[$i] != null) {
				$detail_pelanggaran = DetailPelanggaran::create(
					[
						'nis' => $req->nis,
						'nama_siswa' => $req->nama_siswa,
						'kelas' => $req->kelas,
						'kategori' => $req['kategori-1'],
						'nama_pelanggaran' => $nama_belajar[$i],
						'poin' => $poin_belajar[$i],
					]
				);
			}else {
				continue;
			}
		}

		for ($i=0; $i < count($sikap); $i++) {
			if ($nama_sikap[$i] != null) {
				$detail_pelanggaran = DetailPelanggaran::create(
					[
						'nis' => $req->nis,
						'nama_siswa' => $req->nama_siswa,
						'kelas' => $req->kelas,
						'kategori' => $req['kategori-2'],
						'nama_pelanggaran' => $nama_sikap[$i],
						'poin' => $poin_sikap[$i],
					]
				);
			}else {
				continue;
			}
		}

		$total_poin = array_sum($poin_berpakaian) + array_sum($poin_belajar) + array_sum($poin_sikap);
		$total = $total_poin_sebelumnya + $total_poin;

		$pelanggaran = Pelanggaran::where('nis', $req->nis)->update([
			'total_poin' => $total,
  	   	]);

		return redirect()->route('dashboard')->with('status', 'Data Jenis Pelanggaran Berhasil Ditambahkan!');
	}

	public function get_jenis_pelanggaran($id)
	{
	    $jenis_pelanggaran = JenisPelanggaran::where('id', $id)->get()->first();

	    return view('ubah_jenis_pelanggaran', compact('jenis_pelanggaran', $jenis_pelanggaran));
	}

	public function tambah_Jenis_pelanggaran(Request $req)
	{
		$jenis_pelanggaran = JenisPelanggaran::create([
  		    'kategori' => $req->kategori,
            'nama_pelanggaran' => $req->nama_pelanggaran,
  		    'poin' => $req->poin,
  	   	]);

		return redirect()->back()->with('status', 'Data Jenis Pelanggaran Berhasil Ditambahkan!');
	}

	public function ubah_Jenis_pelanggaran(Request $req)
	{
		$jenis_pelanggaran = JenisPelanggaran::where('id', $req->id)->update([
  		    'kategori' => $req->kategori,
            'nama_pelanggaran' => $req->nama_pelanggaran,
  		    'poin' => $req->poin,
  	   	]);

		return redirect()->route('dashboard')->with('status', 'Data Jenis Pelanggaran Berhasil Diubah!');
	}

	public function kirim_sms(Request $req)
	{
		if ($req->pilih1 == 1 && $req->pilih2 == null) {
			$nis = Pelanggaran::where('total_poin', '>=', 50)
				->get('nis')->pluck('nis');

            if (count($nis) > 0) {
                for ($i=0; $i < count($nis); $i++) {
                    $telp = Siswa::where('nis', $nis[$i])->get('telp_wali')->pluck('telp_wali');
                    $nama = Siswa::where('nis', $nis[$i])->get('nama_siswa')->pluck('nama_siswa');
                    $kelas = Siswa::where('nis', $nis[$i])->get('kelas')->pluck('kelas');
                }

                if (count($telp) > 0) {
                    for ($i=0; $i < count($telp); $i++) {
                        $nexmo = app('Nexmo\Client');
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' DISKORS selama 1 Hari. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    return redirect()->back()->with('status', 'SMS sudah dikirim!');
                }else {
                    return redirect()->back()->with('status', 'Tidak ada nomor telp!');
                }
            }else {
                return redirect()->back()->with('status', 'Tidak ada siswa yang melanggar!');
            }
		}elseif ($req->pilih1 == null && $req->pilih2 == 1) {
			$nis = Pelanggaran::where('total_poin', '>=', 100)
				->get('nis')->pluck('nis');

			if (count($nis) > 0) {
                for ($i=0; $i < count($nis); $i++) {
                    $telp = Siswa::where('nis', $nis[$i])->get('telp_wali')->pluck('telp_wali');
                    $nama = Siswa::where('nis', $nis[$i])->get('nama_siswa')->pluck('nama_siswa');
                    $kelas = Siswa::where('nis', $nis[$i])->get('kelas')->pluck('kelas');
                }

                if (count($telp) > 0) {
                    for ($i=0; $i < count($telp); $i++) {
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' dinyatakan telah melakukan pelanggaran berat dan diharuskan wali untuk datang ke sekolah pada hari senin. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    return redirect()->back()->with('status', 'SMS sudah dikirim!');
                }else {
                    return redirect()->back()->with('status', 'Tidak ada nomor telp!');
                }
            }else {
                return redirect()->back()->with('status', 'Tidak ada siswa yang melanggar!');
            }
		}elseif ($req->pilih1 == 1 && $req->pilih2 == 1) {
			$nis1 = Pelanggaran::where('total_poin', '>=', 50)
				->get('nis')->pluck('nis');

            $nis2 = Pelanggaran::where('total_poin', '>=', 100)
                ->get('nis')->pluck('nis');

            if (count($nis1) > 0 || count($nis2) > 0) {
                for ($i=0; $i < count($nis1); $i++) {
                    $telp1 = Siswa::where('nis', $nis1[$i])->get('telp_wali')->pluck('telp_wali');
                    $nama1 = Siswa::where('nis', $nis1[$i])->get('nama_siswa')->pluck('nama_siswa');
                    $kelas1 = Siswa::where('nis', $nis1[$i])->get('kelas')->pluck('kelas');
                }
                for ($i=0; $i < count($nis2); $i++) {
                    $telp2 = Siswa::where('nis', $nis2[$i])->get('telp_wali')->pluck('telp_wali');
                    $nama2 = Siswa::where('nis', $nis2[$i])->get('nama_siswa')->pluck('nama_siswa');
                    $kelas2 = Siswa::where('nis', $nis2[$i])->get('kelas')->pluck('kelas');
                }
                if (count($telp1) > 0 && count($telp2) > 0) {
                    for ($i=0; $i < count($telp1); $i++) {
                        $nexmo = app('Nexmo\Client');
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' DISKORS selama 1 Hari. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    for ($i=0; $i < count($telp2); $i++) {
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' dinyatakan telah melakukan pelanggaran berat dan diharuskan wali untuk datang ke sekolah pada hari senin. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    return redirect()->back()->with('status', 'SMS sudah dikirim!');
                }elseif (count($telp1) > 0) {
                    for ($i=0; $i < count($telp1); $i++) {
                        $nexmo = app('Nexmo\Client');
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' DISKORS selama 1 Hari. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    return redirect()->back()->with('status', 'SMS sudah dikirim!');
                }elseif (count($telp2) > 0) {
                    for ($i=0; $i < count($telp2); $i++) {
                        $nexmo->message()->send([
                            'to' => $telp[$i],
                            'from' => '6283117414321',
                            'text' => 'Guru BK SMK PGRI 2 Denpasar.<br> Dengan Hormat, sehubungan dengan hasil perolehan poin pelanggaran anak Bapak / Ibu, Orang Tua atau Wali dari '.$nama[$i].' dengan '.$kelas[$i].'. Bahwa '.$nama[$i].' telah terkena sanksi dengan poin sekian. Berdasarkan poin yang didapatkan, '.$nama[$i].' dinyatakan telah melakukan pelanggaran berat dan diharuskan wali untuk datang ke sekolah pada hari senin. Demikianlah kami sampaikan kepada Bapak / Ibu atas bantuan dan perhatiannya, kami ucapkan terima kasih.',
                        ]);
                    }
                    return redirect()->back()->with('status', 'SMS sudah dikirim!');
                }else {
                    return redirect()->back()->with('status', 'Tidak ada nomor telp!');
                }
            }else {
                return redirect()->back()->with('status', 'Tidak ada siswa yang melanggar!');
            }
		}else {
			return redirect()->back()->with('status', 'Tidak Memilih Opsi!');
		}
	}
}
