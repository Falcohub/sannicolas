<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relacion uno a muchos inversa

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class, 'cat_id');
    }

    //Relacion muchos a muchos
    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }

    //Relacion uno a uno polimorfica
    public function imagen(){
        return $this->morphOne(Imagen::class, 'imageable');
    }
}
