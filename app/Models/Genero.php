<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $table ="generos";

    //un genero una o muchas peliculas
    public function peliculas(){
        return $this->hasMany('\App\Models\Pelicula');

    }

}
