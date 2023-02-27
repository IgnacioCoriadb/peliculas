<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //consultas sql

class ApiActoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getListaActores(){
         
        $actoresLista = DB::select(DB::raw("SELECT ac.nombre, ac.apellido, count(ap.pelicula_id) as cant_pel FROM actores AS ac INNER JOIN actor_pelicula AS ap ON ac.id = ap.actor_id
        GROUP BY ac.nombre,ac.apellido
        ORDER BY cant_pel DESC"));

        return  $actoresLista;
     }




}
