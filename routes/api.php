<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SoalJawabanController;
use App\Http\Controllers\UserMapelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['api','cors'])->group(function(){
    Route::apiResource('admin',AdminController::class);
    Route::apiResource('data_guru',DataGuruController::class);
    Route::apiResource('jawaban',JawabanController::class);
    Route::apiResource('kelas',KelasController::class);
    Route::apiResource('mapel',MapelController::class);
    Route::apiResource('nilai',NilaiController::class);
    Route::apiResource('siswa',SiswaController::class);
    Route::apiResource('soal_jawaban',SoalJawabanController::class);
    Route::apiResource('user_mapel',UserMapelController::class);
// });
