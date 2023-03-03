<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Soal_jawaban extends Model
{
    use HasFactory;

     protected $fillable =[
        "id_mapel","id_kelas","no_soal","soal","gambar","pilihan_A","pilihan_B","pilihan_C","pilihan_D","pilihan_E","jawaban_benar"
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }

    public function mapel(): BelongsTo
    {
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
    public function jumlah_soal(): BelongsTo
    {
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }
}
