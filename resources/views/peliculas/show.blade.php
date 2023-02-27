@extends('layouts.app') <!--importo el layout-->

@section('content')

<h1>Pelicula</h1>

<div class="row row-cols-1 row-cols-md-3 g-4 ">

    <div class="col align-self-center ">
        <div class="card h-100">
            <img src="/storage/portadas/{{$peliculas->imagen_portada}}" class=" img-thumbnail" alt="imagen pelicula">
        <div class="card-body">
       
        <h5 class="card-title"><a href="/peliculas/{{$peliculas->id}}">{{$peliculas->titulo}}</a></h5>
            <p class="card-text"> Director:<a href="/directores/{{$peliculas->director->id}}"> {{$peliculas->director->nombre." ".$peliculas->director->apellido}}</a></p>
            <p class="card-text">Genero: {{$peliculas->genero->nombre_genero}}</p>
            <p class="card-text">Actores:</p>
                @foreach($peliculas->actores as $actores)
                    <li><a href="../actores/{{$actores->id}}">{{$actores->nombre." ".$actores->apellido}}</a></li>
                @endforeach
            <br>
           <p class="card-text"><small class="text-muted">Año de estreno: {{$peliculas->anio}}</small></p>
   
        <!--Solo si el usuario esta logueado y es el creador  va a poder editar o eliminar-->
           @if(!Auth::guest()) <!--en el caso de que este logueado le mostramos edit/delete-->
            @if(Auth::user()->id == $peliculas->user_id) <!--si el usuario logueado es el autor de la publicacion de la pelicula-->
            <div class="row">
                <div class="col align-self-start">
                <a href="/peliculas/{{$peliculas->id}}/edit"  class="btn btn-primary">Editar Pelicula</a>
                </div>

                <div class="col align-self-center">

                    {!! Form::open(['action' => ['App\Http\Controllers\PeliculasController@destroy', $peliculas->id], 'method'=>'DELETE']) !!} <!--Procesa el form el metodo store-->

                        {{form::submit("Eliminar Pelicula", ["class"=>"btn btn-danger"])}}
                    
                    {!! Form::close() !!}
                </div>
            </div>    
            @endif
        @endif
    </div>
</div>

    

@endsection