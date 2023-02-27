<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $table ="peliculas";

    //una pelicula un solo director
    public function director(){
        return $this->belongsTo('\App\Models\Director');
    }

    //una pelicula muchos actores
    public function actores(){
        return $this->belongsToMany('\App\Models\Actor', 'actor_pelicula', 'pelicula_id', 'actor_id')->withTimestamps();
    }

    //una pelicula un usuario
    public function user(){
        return $this->belongsTo('\App\Models\User');
    }

    //una pelicula un genero
    public function genero(){
        return $this->belongsTo('\App\Models\Genero');
    }

}
