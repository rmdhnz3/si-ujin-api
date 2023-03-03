<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
     protected $fillable = [
        'kelas_id','absen','nis','nama','jenis_kelamin'
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(User_mapel::class, 'kelas_id');
    }
}
