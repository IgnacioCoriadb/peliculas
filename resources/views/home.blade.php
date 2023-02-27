@extends('layouts.app') <!--importo el layout-->


@section('content')

<h1>Todas Mis Peliculas</h1>

@if(count($peliculas) >0) <!--si tengo cargadas peliculas-->

<div class="row row-cols-1 row-cols-md-3 g-4">

    @foreach($peliculas as $pelicula)
    
    <div class="col">
        <div class="card h-100">
        <img src="/storage/portadas/{{$pelicula->imagen_portada}}" class=" img-thumbnail" alt="imagen pelicula">
        <div class="card-body">
        <h5 class="card-title"><a href="/peliculas/{{$pelicula->id}}">{{$pelicula->titulo}}</a></h5>
            <p class="card-text"> Director:<a href="/directores/{{$pelicula->director->id}}"> {{$pelicula->director->nombre." ".$pelicula->director->apellido}}</a></p>
            <p class="card-text">Genero: {{$pelicula->genero->nombre_genero}}</p>
            <p class="card-text">Actores:</p>
            @foreach($pelicula->actores as $actores)
                <li><a href="actores/{{$actores->id}}">{{$actores->nombre." ".$actores->apellido}}</a></li>
            @endforeach
            <br>
           <p class="card-text"><small class="text-muted">Año de estreno: {{$pelicula->anio}}</small></p>
        </div>
        </div>
    </div>
    @endforeach
@endif
@endsection