<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'icon' => $this->icon,
            'title' => $this->localizedValue('title'),
            'description' => $this->localizedValue('description'),
            'order' => $this->order,
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => [
                    'title' => $this->title_ar ?? '',
                    'description' => $this->description_ar ?? '',
                ],
                'en' => [
                    'title' => $this->title_en ?? '',
                    'description' => $this->description_en ?? '',
                ],
            ],
        ];
    }
}
