<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'category' => $this->category,
            'icon' => $this->icon,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'published_at' => $this->published_at?->toIso8601String(),
            'order' => $this->order,
        ];
    }
}
