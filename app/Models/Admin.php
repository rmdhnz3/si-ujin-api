<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

      protected $fillable = [
        'username','password','nama_admin'
    ];

    public function getUpdatedAtColumn() {
    return null;
    }
    public function getCreatedAtColumn() {
        return null;
    }
}
