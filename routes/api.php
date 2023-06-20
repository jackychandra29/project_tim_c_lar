<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('/bangunan', BangunanController::class);
Route::resource('/rombel', RombelController::class);
Route::resource('/ruang', RuangController::class);
Route::resource('/siswa', SiswaController::class);
Route::resource('/jurusan_sp', Jurusan_spController::class);
Route::resource('/registrasi', RegistrasiController::class);
Route::resource('/ptk', PTKController::class);
Route::resource('/staff_ptk_sp', Staff_PTK_SP_Controller::class);
Route::resource('/sekolah', SekolahController::class);
Route::resource('/kecamatan', KecamatanController::class);
Route::resource('/kabkota', KabKotaController::class);
Route::resource('/jenis_ruang', JenisRuangController::class);
Route::resource('/staff', StaffController::class);
Route::resource('/jurusan', JurusanController::class);