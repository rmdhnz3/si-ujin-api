<?php

use App\Enums\RoleEnum;
use App\Http\Controllers\API\DataGuruController;
use App\Http\Controllers\API\SiswaController;
use App\Http\Controllers\API\UserMapelController;
use App\Models\Data_guru;
use App\Models\Soal_jawaban;
use League\Csv\Reader;
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

Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
    Route::post('login', 'LoginController')->name('login');
});

Route::group(['middleware' => ['auth:sanctum', 'role:' . RoleEnum::ADMINISTRATOR->value]], function () {
    Route::APIResource('kelas',KelasController::class);
    Route::APIResource('mapel', MapelController::class);
    Route::APIResource('nilai',NilaiController::class);
    Route::APIResource('siswa',SiswaController::class);
    Route::APIResource('soal_jawaban',SoalJawabanController::class);
    
    Route::post('/upload_soal', 'FileController@upload'); 
    
});


Route::group(['middleware' => ['auth:sanctum', 'role:' . RoleEnum::GURU->value.'|'.RoleEnum::ADMINISTRATOR->value]], function () {
    Route::APIResource('data_guru',DataGuruController::class);
    Route::APIResource('kelas',KelasController::class);
    Route::APIResource('mapel', MapelController::class);
    Route::APIResource('nilai',NilaiController::class);
    Route::APIResource('siswa',SiswaController::class);
    Route::APIResource('soal_jawaban',SoalJawabanController::class);
    Route::post('/upload_soal', 'FileController@upload'); 
        
});

Route::group(['middleware' => ['auth:sanctum', 'role:' . RoleEnum::GURU->value.'|'.RoleEnum::ADMINISTRATOR->value.'|'.RoleEnum::SISWA->value]], function () {
    Route::APIResource('kelas',KelasController::class);
    Route::APIResource('mapel', MapelController::class);
    Route::APIResource('user_mapel', UserMapelController::class);
    Route::APIResource('nilai',NilaiController::class);
    Route::APIResource('soal_jawaban',SoalJawabanController::class);
        
});



Route::group(['middleware' => ['auth:sanctum']], function () {
       Route::post('logout', 'LogoutController')->name('logout');
});