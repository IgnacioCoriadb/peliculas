<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pelicula extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=> $this->id,
            "titulo"=> $this->titulo,
            "anio"=> $this->anio,
            "imagen_portada"=> $this->imagen_portada,
            "director_id"=> $this->director_id,
            "genero_id"=>$this->genero_id,

        ];
    }

    public function with($request)
    {
        return [
            'version' => 'tallerProgramacionPeliculas'
        ];
    }
}
