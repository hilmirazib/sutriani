<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\MataPelajaranController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('home');
})->name('dashboard');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/guru/data', [GuruController::class, 'data'])->name('guru.data');
    Route::resource('/guru', GuruController::class);

    Route::get('/mata-pelajaran/data', [MataPelajaranController::class, 'data'])->name('mata_pelajaran.data');
    Route::resource('/mata-pelajaran', MataPelajaranController::class);
});
