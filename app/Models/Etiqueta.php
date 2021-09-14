<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    // Asignacion masiva
    protected $fillable = ['etq_name', 'etq_slug', 'etq_color'];

    // Agregar slug a la url 
    public function getRouteKeyName()
    {
        return "etq_slug";
    }

    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
