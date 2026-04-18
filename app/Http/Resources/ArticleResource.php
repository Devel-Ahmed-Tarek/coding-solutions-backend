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
            'title' => $this->localizedValue('title'),
            'description' => $this->localizedValue('description'),
            'slug' => $this->localizedValue('slug'),
            'category' => $this->localizedValue('category'),
            'icon' => $this->icon,
            'image' => $this->image ? asset('storage/'.$this->image) : null,
            'published_at' => $this->published_at?->toIso8601String(),
            'order' => $this->order,
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => [
                    'title' => $this->title_ar ?? '',
                    'description' => $this->description_ar ?? '',
                    'slug' => $this->slug_ar ?? '',
                    'category' => $this->category_ar ?? '',
                ],
                'en' => [
                    'title' => $this->title_en ?? '',
                    'description' => $this->description_en ?? '',
                    'slug' => $this->slug_en ?? '',
                    'category' => $this->category_en ?? '',
                ],
                'de' => [
                    'title' => $this->title_de ?? '',
                    'description' => $this->description_de ?? '',
                    'slug' => $this->slug_de ?? '',
                    'category' => $this->category_de ?? '',
                ],
            ],
        ];
    }
}
