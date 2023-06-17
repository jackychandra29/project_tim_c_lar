<?php

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

Route::get('sekolah', [App\Http\Controllers\SekolahController::class, 'sekolah']);
Route::get('staff', [App\Http\Controllers\StaffController::class, 'staff']);
