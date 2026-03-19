<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CycleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'nombre'      => $this->name,
            'institucion' => $this->whenLoaded('institution', fn() => [
                'id'     => $this->institution->id,
                'nombre' => $this->institution->name,
            ]),
            'salones' => ClassroomResource::collection($this->whenLoaded('classrooms')),
        ];
    }
}
