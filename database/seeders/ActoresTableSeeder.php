<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;


class ActoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actores = new Actor();
        $actores->nombre ="Christian";
        $actores->apellido ="Bale";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Michael";
        $actores->apellido ="Caine";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Gary";
        $actores->apellido ="Oldman";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Francesca";
        $actores->apellido ="Annis";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="José";
        $actores->apellido ="Ferrer";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Brad";
        $actores->apellido ="Dourif";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Paul";
        $actores->apellido ="Smith";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Aaron";
        $actores->apellido ="Paul";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Robert";
        $actores->apellido ="Forster";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Krysten";
        $actores->apellido ="Ritter";
        $actores->save();

        $actores = new Actor();
        $actores->nombre =" Elijah";
        $actores->apellido ="Wood";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Ian";
        $actores->apellido ="McKellen";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Daniel";
        $actores->apellido ="Radcliffe";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Rupert";
        $actores->apellido ="Grint";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Emma";
        $actores->apellido ="Watson";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Michael";
        $actores->apellido ="Fox";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Lea";
        $actores->apellido ="Thompson";
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Ricardo";
        $actores->apellido ="Darín"; 
        $actores->save();

        $actores = new Actor();
        $actores->nombre ="Guillermo";
        $actores->apellido ="Francella";
        $actores->save();

    

    }
}
