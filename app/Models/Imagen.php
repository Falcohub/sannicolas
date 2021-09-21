<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    // Asignacion masiva
    protected $fillable = ['img_url'];

    //Relacion polimorfica

    public function imageable(){
        return $this->morphTo();
    }
}
