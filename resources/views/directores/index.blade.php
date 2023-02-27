@extends('layouts.app') 

@section('content')

<h1>Directores</h1>

@foreach($directores as $director)
   <h2><a href="/directores/{{$director->id}}">{{ $director->nombre." ".$director->apellido}}</a></h2>
@endforeach



@endsection