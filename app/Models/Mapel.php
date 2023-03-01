<?php

namespace App\Models;

use App\Http\Controllers\API\DataGuruController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mapel extends Model
{
    use HasFactory;

      protected $fillable = [
        'id_guru','mapel','durasi','kelas_jurusan','gambar','jumlah_soal','waktu_akhir'
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }

    public function Soal_jawaban(): BelongsTo
    {
        return $this->belongsTo(Soal_jawaban::class,'id');
    }

    public function jumlah_soal ():HasMany 
    {
        return $this->hasMany(Soal_jawaban::class,'id_mapel');
    }

    public function guru(): BelongsTo 
    {
        return $this->belongsTo(Data_guru::class, 'id_guru');
    }
}
