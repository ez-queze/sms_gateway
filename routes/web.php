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

		Route::get('/informasi/{nis}', [BkController::class, 'get_info']);
		Route::get('/informasi/{nis}', [KpController::class, 'get_info']);
		Route::get('/informasi/hapus/{id}', [KpController::class, 'hapus_detail']);
		Route::post('/kirim', [BkController::class, 'kirim_sms'])->name('kirim_sms');
    	});
});
