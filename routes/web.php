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
            Route::post('/pelanggaran', [BkController::class, 'tambah_pelanggaran'])->name('pelanggaran');
        });

        Route::prefix('ubah')->name('ubah.')->group(function() {
            Route::post('/siswa', [BkController::class, 'ubah_siswa'])->name('siswa');
        });

        Route::get('/personal', [KpController::class, 'personal'])->name('personal');

        Route::get('/ubah_siswa', function () {
            return view('ubah_siswa');
        })->name('ubah_siswa');

        Route::get('/tambah_pelanggaran', function () {
            return view('tambah_pelanggaran');
        })->name('tambah_pelanggaran');

        Route::get('/ubah_jenis_pelanggaran', function () {
            return view('ubah_jenis_pelanggaran');
        })->name('ubah_jenis_pelanggaran');
    });
});

require __DIR__.'/auth.php';
