<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

      protected $fillable = [
        'mapel','durasi','kelas_jurusan','gambar','jumlah_soal','waktu_mulai','waktu_akhir'
    ];
}
