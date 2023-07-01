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
Route::post('/bangunan/{bangunan}', [BangunanController::class,"update"]);
Route::resource('/rombel', RombelController::class);
Route::post('/rombel/{rombel}', [RombelController::class,"update"]);
Route::resource('/ruang', RuangController::class);
Route::post('/ruang/{ruang}', [RuangController::class,"update"]);
Route::resource('/siswa', SiswaController::class);
Route::post('/siswa/{siswa}', [SiswaController::class,"update"]);
Route::resource('/jurusan_sp', Jurusan_spController::class);
Route::post('/jurusan_sp/{jurusan_sp}', [Jurusan_spController::class,"update"]);
Route::resource('/registrasi', RegistrasiController::class);
Route::post('/registrasi/{registrasi}', [RegistrasiController::class,"update"]);
Route::resource('/ptk', PTKController::class);
Route::post('/ptk/{ptk}', [PTKController::class,"update"]);
Route::resource('/staff_ptk_sp', Staff_PTK_SP_Controller::class);
Route::post('/staff_ptk_sp/{staff_ptk_sp}', [Staff_PTK_SP::class,"update"]);
Route::resource('/sekolah', SekolahController::class);
Route::post('/sekolah/{sekolah}', [SekolahController::class,"update"]);
Route::resource('/kecamatan', KecamatanController::class);
Route::post('/kecamatan/{kecamatan}', [KecamatanController::class,"update"]);
Route::resource('/kabkota', KabKotaController::class);
Route::post('/kabkota/{kabkota}', [KabKotaController::class,"update"]);
Route::resource('/jenis_ruang', JenisRuangController::class);
Route::post('/jenis_ruang/{jenis_ruang}', [JenisRuangController::class,"update"]);
Route::resource('/staff', StaffController::class);
Route::post('/staff/{staff}', [StaffController::class,"update"]);
Route::resource('/jurusan', JurusanController::class);
Route::post('/jurusan/{jurusan}', [JurusanController::class,"update"]);

Route::post('/register', [RegisterController::class,'store']);
Route::get('/users', [RegisterController::class, 'index']);
Route::post('/users/{users}', [RegisterController::class,"update"]);
// Route::resource('/users', RegisterController::class);
Route::post('/login', [LoginController::class,'check']);
