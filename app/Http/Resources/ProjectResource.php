<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $images = $this->images->map(fn ($img) => asset('storage/'.$img->path));

        return [
            'id' => $this->id,
            'title' => $this->localizedValue('title'),
            'description' => $this->localizedValue('description'),
            'category' => $this->localizedValue('category'),
            'image' => $images->first() ?? ($this->image ? asset('storage/'.$this->image) : null),
            'images' => $images->values()->all(),
            'link' => $this->link,
            'technologies' => $this->technologies->map(fn ($t) => $t->localizedValue('name'))->values(),
            'technologies_translations' => $this->technologies->map(fn ($t) => [
                'id' => $t->id,
                'ar' => ['name' => $t->name_ar ?? ''],
                'en' => ['name' => $t->name_en ?? ''],
                'de' => ['name' => $t->name_de ?? ''],
            ])->values(),
            'order' => $this->order,
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => [
                    'title' => $this->title_ar ?? '',
                    'description' => $this->description_ar ?? '',
                    'category' => $this->category_ar ?? '',
                ],
                'en' => [
                    'title' => $this->title_en ?? '',
                    'description' => $this->description_en ?? '',
                    'category' => $this->category_en ?? '',
                ],
                'de' => [
                    'title' => $this->title_de ?? '',
                    'description' => $this->description_de ?? '',
                    'category' => $this->category_de ?? '',
                ],
            ],
        ];
    }
}
