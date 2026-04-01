<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $images = $this->images->map(fn ($img) => asset('storage/' . $img->path));

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'image' => $images->first() ?? ($this->image ? asset('storage/' . $this->image) : null),
            'images' => $images->values()->all(),
            'link' => $this->link,
            'technologies' => $this->technologies->pluck('name'),
            'order' => $this->order,
        ];
    }
}
