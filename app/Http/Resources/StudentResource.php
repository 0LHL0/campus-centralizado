<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'nombre'      => $this->name,
            'apellido'    => $this->last_name,
            'cumpleanos'  => $this->birthday,
            // whenLoaded — solo incluye la relación si fue cargada con with()
            'salon'       => $this->whenLoaded('classroom', fn() => [
                'id'         => $this->classroom->id,
                'nombre'     => $this->classroom->name,
                'grado'      => $this->classroom->grade,
                'seccion'    => $this->classroom->section,
                'capacidad'  => $this->classroom->capacity,
                'ciclo'      => $this->whenLoaded('classroom', fn() => [
                    'id'         => $this->classroom->cycle->id,
                    'nombre'     => $this->classroom->cycle->name,
                    'institucion' => [
                        'id'     => $this->classroom->cycle->institution->id,
                        'nombre' => $this->classroom->cycle->institution->name,
                    ]
                ]),
            ]),
        ];
    }
}
