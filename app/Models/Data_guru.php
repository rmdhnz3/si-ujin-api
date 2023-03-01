<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Data_guru extends Model
{
    use HasFactory;

      protected $fillable = [
        'nip','nama','guru_mapel'

    ];

    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }

    public function mapel () : HasMany
     {
        return $this->hasMany(Mapel::class,'id_guru');
    }


}
