<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User_mapel extends Model
{
    use HasFactory;

      protected $fillable = [
        'id_mapel','id_guru','id_siswa','status'
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }
    public function mapel():BelongsTo
    {
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
    public function siswa():BelongsTo
    {
        return $this->BelongsTo(Siswa::class,'id_siswa');
    }
    public function guru():BelongsTo
    {
        return $this->BelongsTo(Data_guru::class,'id_guru');
    }
}
