<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nilai extends Model
{
    use HasFactory;

     protected $fillable = [ 
        'id_siswa','id_mapel','nilai'
    ];
    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }
    public function mapel () :BelongsTo
     {
        return $this->BelongsTo(Mapel::class,'id_mapel');
    }
    public function siswa () :BelongsTo
     {
        return $this->BelongsTo(Siswa::class,'id_siswa');
    }
}
