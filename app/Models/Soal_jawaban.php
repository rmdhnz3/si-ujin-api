<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal_jawaban extends Model
{
    use HasFactory;

     protected $fillable =[
        "id_mapel","id_kelas","no_soal","soal","gambar","pilihan_A","pilihan_B","pilihan_C","pilihan_D","pilihan_E","skor_benar","skor_salah"
    ];
}
