<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->integer("anio");
            $table->string("imagen_portada");
            $table->unsignedBigInteger("director_id");
            $table->unsignedBigInteger("genero_id");
            $table->unsignedBigInteger("user_id");
            $table->timestamps();

            //claves foraneas
            $table->foreign('director_id')->references('id')->on('directores');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelicuphp alas');
    }
}
