<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\DataGuruController;
use App\Http\Controllers\API\JawabanController;
use App\Http\Controllers\API\KelasController;
use App\Http\Controllers\API\MapelController;
use App\Http\Controllers\API\NilaiController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\SoalJawabanController;
use App\Http\Controllers\API\UserMapelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "API" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['API','cors'])->group(function(){
    Route::APIResource('admin',AdminController::class);
    Route::APIResource('data_guru',DataGuruController::class);
    Route::APIResource('jawaban',JawabanController::class);
    Route::APIResource('kelas',KelasController::class);
    Route::APIResource('mapel',MapelController::class);
    Route::APIResource('nilai',NilaiController::class);
    Route::APIResource('siswa',SiswaController::class);
    Route::APIResource('soal_jawaban',SoalJawabanController::class);
    Route::APIResource('user_mapel',UserMapelController::class);
// });
