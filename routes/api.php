<?php

use App\Enums\RoleEnum;
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

// Route::group(['middleware' => ['auth:sanctum']], function () {
//     Route::post('logout', 'LogoutController')->name('logout');

    Route::APIResource('admin', 'AdminController');
    Route::APIResource('mapel', MapelController::class);
    Route::APIResource('nilai',NilaiController::class);
    Route::APIResource('siswa',SiswaController::class);
    Route::APIResource('soal_jawaban',SoalJawabanController::class);
    Route::APIResource('user_mapel',UserMapelController::class);
// });

// Route::group(['middleware' => ['auth:sanctum', 'role:' . RoleEnum::ADMINISTRATOR->value]], function () {
    Route::APIResource('kelas',KelasController::class);
    Route::APIResource('jawaban',JawabanController::class);
// });

// Route::group(['middleware' => ['auth:sanctum', 'role:' . RoleEnum::GURU->value]], function () {
    Route::APIResource('data_guru',DataGuruController::class);
// });