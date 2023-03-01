<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jawaban extends Model
{
    use HasFactory;

      protected $fillable = [
        'id_soal_jawaban','id_siswa','jawaban'
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }
    public function soljab():BelongsTo
    {
        return $this->belongsTo(Soal_jawaban::class,'id_soal_jawaban');
    }
}
