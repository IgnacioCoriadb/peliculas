<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new Genero();
        $genero->nombre_genero ="Acción";
        $genero->save();

        $genero = new Genero();
        $genero->nombre_genero ="Drama";
        $genero->save();

        $genero = new Genero();
        $genero->nombre_genero ="Suspenso";
        $genero->save();

        $genero = new Genero();
        $genero->nombre_genero ="Fantasía";
        $genero->save();

        $genero = new Genero();
        $genero->nombre_genero ="Aventuras";
        $genero->save();

        $genero = new Genero();
        $genero->nombre_genero ="Policial";
        $genero->save();
    }
}
