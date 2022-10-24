<?php

use App\Http\Controllers\DataNSikapController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KeterampilanController;
use App\Http\Controllers\KeterampilanMemberController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PengetahuanMemberController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn () => redirect()->route('login'));

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware(['auth', 'role:guru,siswa']);
Route::get('/mata-pelajaran/data', [MataPelajaranController::class, 'data'])->name('mata_pelajaran.data')->middleware(['auth', 'role:guru,siswa']);
Route::get('/data-nilai-sikap/data', [DataNSikapController::class, 'data'])->name('data_n_sikap.data')->middleware(['auth', 'role:guru,siswa']);
Route::get('/data-keterampilan/data', [KeterampilanController::class, 'data'])->name('data_keterampilan.data')->middleware(['auth', 'role:guru,siswa']);
Route::get('/data-pengetahuan/data', [PengetahuanController::class, 'data'])->name('data_pengetahuan.data')->middleware(['auth', 'role:guru,siswa']);
Route::group([
    'middleware' => ['auth', 'role:guru']
], function () {
    Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
    Route::resource('/guru', GuruController::class);

    Route::resource('/mata-pelajaran', MataPelajaranController::class);

    Route::resource('/data-nilai-sikap', DataNSikapController::class);

    Route::resource('/data-keterampilan', KeterampilanController::class);

    Route::resource('/data-pengetahuan', PengetahuanController::class);

    Route::get('/data-siswa/data', [DataSiswaController::class, 'data'])->name('data_siswa.data');
    Route::resource('/data-siswa', DataSiswaController::class);
});
Route::group([
    'middleware' => ['auth', 'role:siswa']
], function () {
    Route::get('/keterampilan-member/data', [KeterampilanMemberController::class, 'data'])->name('keterampilan_member.data');
    Route::get('/pengetahuan-member/data', [PengetahuanMemberController::class, 'data'])->name('pengetahuan_member.data');
    Route::get('/sikap-member/data', [DataNSikapController::class, 'dataMember'])->name('sikap_member.data');
    Route::get('/nilai-sikap-member', [DataNSikapController::class, 'member'])->name('nilai_sikap.member');
    Route::get('/nilai-keterampilan', [KeterampilanMemberController::class, 'member'])->name('nilai_keterampilan.member');
    Route::get('/nilai-pengetahuan', [PengetahuanMemberController::class, 'member'])->name('nilai_pengetahuan.member');
});
