<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // habilitar asignacion masiva

    protected $fillable = ['cat_nombre', 'cat_slug'];

    // Agregar slug a la url 
    public function getRouteKeyName()
    {
        return "cat_slug";
    }

    //Relacion uno a muchos

    public function posts(){
        return $this->hasMany(Post::class, 'cat_id');
    }
}
