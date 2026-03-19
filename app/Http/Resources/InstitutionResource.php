<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InstitutionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'nombre'    => $this->name,
            'email'     => $this->email,
            'telefono'  => $this->phone,
            'direccion' => $this->address,
            // CycleResource::collection formatea cada ciclo con su propio resource
            'ciclos'    => CycleResource::collection($this->whenLoaded('cycles')),
        ];
    }
}
