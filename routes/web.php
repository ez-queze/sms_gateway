<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BkController;
use App\Http\Controllers\KpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::middleware(['guest'])->group(function () {
	Route::get('/', function () {
		return view('welcome');
	})->name('welcome');

	Route::get('/visi', function () {
		return view('visi');
	})->name('visi');

	Route::get('/organisasi', function () {
		return view('organisasi');
	})->name('organisasi');
});

Route::middleware(['auth'])->group(function () {
    	Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
        Route::post('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

	Route::prefix('dashboard')->name('dashboard.')->group(function() {
		Route::prefix('tambah')->name('tambah.')->group(function() {
			Route::post('/siswa', [BkController::class, 'tambah_siswa'])->name('siswa');
			Route::get('/pelanggaran/{nis}', [BkController::class, 'get_pelanggaran']);
			Route::post('/pelanggaran', [BkController::class, 'tambah_pelanggaran'])->name('pelanggaran');
			Route::post('/jenis_pelanggaran', [BkController::class, 'tambah_jenis_pelanggaran'])->name('jenis_pelanggaran');
		});

		Route::prefix('ubah')->name('ubah.')->group(function() {
			Route::get('/siswa/{nis}', [BkController::class, 'get_siswa']);
			Route::post('/siswa', [BkController::class, 'ubah_siswa'])->name('siswa');
			Route::get('/jenis_pelanggaran/{id}', [BkController::class, 'get_jenis_pelanggaran']);
			Route::post('/jenis_pelanggaran', [BkController::class, 'ubah_jenis_pelanggaran'])->name('jenis_pelanggaran');
		});

        Route::get('/tabel/siswa', [Controller::class, 'tabel_siswa'])->name('tabel_siswa');
        Route::get('/tabel/pelanggaran', [Controller::class, 'tabel_pelanggaran'])->name('tabel_pelanggaran');
        Route::get('/tabel/jenis', [Controller::class, 'tabel_jenis'])->name('tabel_jenis');

		Route::post('/cari/siswa', [Controller::class, 'cari_siswa'])->name('cari_siswa');
		Route::post('/cari/pelanggaran', [Controller::class, 'cari_pelanggaran'])->name('cari_pelanggaran');
		Route::post('/cari/jenis', [Controller::class, 'cari_jenis'])->name('cari_jenis');

        Route::get('/informasi/{nis}', [Controller::class, 'get_info']);
        Route::get('/tabel/info/{nis}', [Controller::class, 'tabel_info'])->name('tabel_info');

        Route::get('/informasi/hapus/{id}', [KpController::class, 'hapus_detail']);
        Route::post('/kirim', [BkController::class, 'kirim_sms'])->name('kirim_sms');
    });
});
