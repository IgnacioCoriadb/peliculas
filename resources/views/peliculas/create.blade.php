@extends('layouts.app') <!--importo el layout-->

@section('content')

<h1>Cargar Pelicula</h1>
<br>
    {!! Form::open(['action' => 'App\Http\Controllers\PeliculasController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-6">
            {{Form::label('titulo', 'Titulo:')}}
            {{ Form::text('titulo', '', ['class' => 'form-control', 'placeholder' => 'Titulo de la Pelicula']) }}
        </div>

        <div class="col-6">
            {{ Form::label('anio', 'Año de estreno:') }}
            {{ Form::number('anio', '', ['class' => 'form-control' , 'placeholder' => '2000']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-6">
        <br>
            {{ Form::label('director', 'Director:')}}
            <select name="director" id="director" style="width: 100%">
                @foreach($directores as $director)
                    <option value="{{$director->id}}">{{ $director->nombre ." ". $director->apellido}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-6">
        <br>
            {{ Form::label('genero', 'Genero:' )}}
            <select name="genero"   style="width: 100%">
                @foreach($generos as $genero)
                    <option value="{{$genero->id}}">{{ $genero->nombre_genero}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
        <br>
            {{ Form::label('actores[]', 'Actores:' )}}
            <br>
                <select name="actores[]"  class="col-md-8 " multiple style="width:100%" >
                    @foreach($actores as $actor)
                        <option value="{{$actor->id}}">{{ $actor->nombre ." ". $actor->apellido}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 file">
                {{Form::file('portada')}}
            </div>
        </div>
    <br><br>
        {{ Form::submit('Agregar Pelicula', ['class' => 'btn btn-primary btn-lg'])}}

    {!! Form::close() !!}
@endsection