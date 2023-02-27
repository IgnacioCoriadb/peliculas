@extends('layouts.app') 
@section('content')

<h1>Actores</h1>

<div class="actores">
    @foreach($actores as $actor)
        <h4><li><a href="/actores/{{$actor->id}}">{{ $actor->nombre." ".$actor->apellido}}</a></li></h4>
    @endforeach
</div>


@endsection


