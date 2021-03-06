<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Asignacion masiva
    // con la propiedad guarded evitamos los campos que se llenen por asignacion masiva
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Agregar slug a la url 
    public function getRouteKeyName()
    {
        return 'post_slug';
    }

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
