<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Genero;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Support\Facades\Storage; //eliminar imagenes del servidor



use Illuminate\Support\Arr;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //para acceder tiene que estar logueado menos en las paginas except
     public function __construct() 
     {
         $this->middleware('auth', ["except" => ["index","show"]]);
     }


    public function index()
    {
    //obtengo todas las peliculas
    $pelicula = Pelicula::orderBy('id', 'desc')->paginate(6);
    
    return view("peliculas.index", ["peliculas"=>$pelicula]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $directores = Director::all();
       $actores= Actor::all();
       $generos= Genero::all();
      
       return view("peliculas.create",["directores"=>$directores,"actores"=>$actores,"generos"=>$generos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar campos del formulario

        $this->validate($request,[
            'titulo'=>'required',
            'anio'=>'required',
            'director'=>'required',
            'genero'=>'required',
            'actores'=>'required',
            "portada" =>'required|image|max:1999'
        ]);
        //proceso la imagen y la guardo en el servidor
        if($request->hasFile('portada')){ //verifico si subio o no un archivo

            //proceso y guardo la imagen
            $nombreOriginal=  $request->file('portada')->getClientOriginalName(); //recupero el nombre del archivo que subio el usuario
            
            //separar nombre de archivo de extension
            $nombre = pathinfo($nombreOriginal, PATHINFO_FILENAME);

            //extension del archivo
            $extension = $request->file('portada')->getClientOriginalExtension();

            $nombre_a_guardar = $nombre ."_".time().".".$extension; //nombre hora extension 

            $request->file('portada')->storeAs('public/portadas',$nombre_a_guardar); //guardo la imagen

        }else{
            //guardo una imagen de muestra(noimage.png)

            $nombre_a_guardar ="noimage.png";
        }


        $pelicula = new Pelicula();
        $pelicula->titulo = $request->input('titulo');
        $pelicula->anio = $request->input('anio');
        $pelicula->genero_id = $request->input('genero');
        $pelicula->director_id = $request->input('director');
        //$pelicula->actores_principales = $request->input('actores');
        $pelicula->imagen_portada = $nombre_a_guardar;
       
        //seteo el id del usuario que está logueado creando la nueva pelicula
        $pelicula->user_id = auth()->user()->id; //pido el id del usuario logueado que esta creando la pelicula  
        
        $pelicula->save();
        $pelicula->actores()->sync($request->input('actores'));


       return redirect("/peliculas")->with("success", "Pelicula Cargada Exitosamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //muestro la pelicula pedida
      $pelicula = Pelicula::findOrFail($id); //obtengo la pelicula y muestro un error 404 si no la encuentra

      return view("peliculas.show", ["peliculas"=>$pelicula]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelicula =Pelicula::findOrFail($id);
        $directores = Director::all();
        $actores= Actor::all();
        $generos= Genero::all();
        
        if (auth()->user()->id !== $pelicula->user_id) {
            return redirect('/peliculas')->with('error', 'La pelicula solo puede ser editada por el creador ');
        } else {
            return view('peliculas.edit', ['pelicula' => $pelicula, 'actores' =>$actores, 'directores' => $directores, 'generos' => $generos]);
        }

       
       return view("peliculas.edit",["directores"=>$directores,"actores"=>$actores,"generos"=>$generos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request,[
            'titulo'=>'required',
            'anio'=>'required',
            'director'=>'required',
            'genero'=>'required',
            "portada" =>'image|max:1999'
        ]);
        //proceso la imagen y la guardo en el servidor
        if($request->hasFile('portada')){ //verifico si subio o no un archivo

            //proceso y guardo la imagen
            $nombreOriginal=  $request->file('portada')->getClientOriginalName(); //recupero el nombre del archivo que subio el usuario
            
            //separar nombre de archivo de extension
            $nombre = pathinfo($nombreOriginal, PATHINFO_FILENAME);

            //extension del archivo
            $extension = $request->file('portada')->getClientOriginalExtension();

            $nombre_a_guardar = $nombre ."_".time().".".$extension; //nombre hora extension 

            $request->file('portada')->storeAs('public/portadas',$nombre_a_guardar); //guardo la imagen
        
        }

        $pelicula = Pelicula::findOrFail($id);
        $pelicula->titulo = $request->input('titulo');
        $pelicula->anio = $request->input('anio');
        $pelicula->genero_id = $request->input('genero');
        $pelicula->director_id = $request->input('director');

        //si cambio la portada, elimino la anterior y cargo la nueva
        if($request->hasFile('portada')){
            Storage::delete("/public/portadas/$pelicula->imagen_portada");
            $pelicula->imagen_portada = $nombre_a_guardar;
        }
        //seteo el id del usuario que está logueado creando la nueva pelicula
        $pelicula->user_id = auth()->user()->id; //pido el id del usuario logueado que esta creando la pelicula  
       
        //si no modifica los actores 
        $actores = Actor::find($request->actores);
         if($actores != null){
            $pelicula->actores()->sync( $actores);
         }
        $pelicula->save();

        return redirect("/peliculas")->with("success", "Pelicula Editada Exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id);
        if(auth()->user()->id !== $pelicula->user_id ) //si el usuario logueado es distinto del usuario de la pelicula
            return redirect('/peliculas')->with("error","Acceso no autorizado");
        else
        
      //elimino imagen del servidor
       Storage::delete("/public/portadas/$pelicula->imagen_portada");
 
       $pelicula->delete();
 
        return redirect("/peliculas")->with("success", "Pelicula Eliminada Exitosamente");
    }
}
