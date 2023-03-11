<?php

namespace App\Models;

use App\Http\Controllers\API\DataGuruController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    // use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'id_guru','id_kelas','mapel','durasi','gambar','waktu_akhir'
    ];
        

    // protected static function boot(){
    //     parent::boot();
    //     static::addGlobalScope('waktu_akhir',function($query){
    //         $query->where('waktu_akhir','<',now())->delete();
        
    //     });
    
    // }

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

    public function kelas():BelongsTo
    {
        return $this -> BelongsTo(Kelas::class,'id_kelas');
    }
    public function nilai():BelongsTo
    {
        return $this -> BelongsTo(Nilai::class,'id_kelas');
    }
}
