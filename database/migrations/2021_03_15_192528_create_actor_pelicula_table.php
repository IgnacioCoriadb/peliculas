<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActorPeliculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_pelicula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelicula_id');
            $table->unsignedBigInteger('actor_id');
            $table->timestamps();

            //claves foraneas
            $table->foreign('pelicula_id')->references('id')->on('peliculas')->onDelete('cascade');
            $table->foreign('actor_id')->references('id')->on('actores')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_pelicula');
    }
}
