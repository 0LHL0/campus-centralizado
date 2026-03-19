<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'titulo'    => $this->title,
            'contenido' => $this->content,
            'publicado' => $this->created_at->format('d/m/Y'),
            'ciclos'    => $this->whenLoaded('cycles', fn() =>
                $this->cycles->map(fn($cycle) => [
                    'id'          => $cycle->id,
                    'nombre'      => $cycle->name,
                    'institucion' => $cycle->institution->name,
                ])
            ),
        ];
    }
}
