<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directores = new Director();
        $directores->nombre ="Christopher";
        $directores->apellido ="Nolan";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="David";
        $directores->apellido ="Lynch";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="Vince";
        $directores->apellido ="Gilligan";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="Peter";
        $directores->apellido ="Jackson";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="Chris";
        $directores->apellido ="Columbus";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="Robert";
        $directores->apellido ="Zemeckis";
        $directores->save();

        $directores = new Director();
        $directores->nombre ="Juan José";
        $directores->apellido ="Campanella";
        $directores->save();
    }
}





 