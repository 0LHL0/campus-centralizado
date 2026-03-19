<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'nombre'    => $this->name,
            'grado'     => $this->grade,
            'seccion'   => $this->section,
            'capacidad' => $this->capacity,
            'ciclo'     => $this->whenLoaded('cycle', fn() => [
                'id'     => $this->cycle->id,
                'nombre' => $this->cycle->name,
            ]),
        ];
    }
}
