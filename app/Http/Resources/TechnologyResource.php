<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TechnologyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->localizedValue('name'),
            'order' => $this->order,
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => ['name' => $this->name_ar ?? ''],
                'en' => ['name' => $this->name_en ?? ''],
            ],
        ];
    }
}
