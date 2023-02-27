<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Http\Resources\Pelicula as PeliculaResource;

class ApiPeliculasController extends Controller
{
    public function getPeliculaAleatoria(){
        $peliculaAleatoria = Pelicula::all()->random();

        return new PeliculaResource($peliculaAleatoria);
    }
}
