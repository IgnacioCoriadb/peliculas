<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table ="actores";

    //un actor una o muchas peliculas
    public function peliculas(){
        return $this->belongsToMany('\App\Models\Pelicula', 'actor_pelicula', 'actor_id', 'pelicula_id')->withTimestamps();
    }

}
