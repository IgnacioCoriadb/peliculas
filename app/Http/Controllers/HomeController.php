<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pelicula;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //muestro todas las peliculas del usuario logueado

        $user_id = auth()->user()->id; //recupero el id del usuario
        $user = User::find($user_id); //recupero el id de la bd
 
        //laravel crea un atributo peliculas por la relacion de usuarios peliculas
        //asi obtengo todos las peliculas creadas por ese usuario
        return view('home', ["peliculas"=> $user->peliculas]);
     
    }

  

}
