<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->localizedValue('name'),
            'job_title' => $this->localizedValue('job_title'),
            'quote' => $this->localizedValue('quote'),
            'rating' => $this->rating,
            'avatar' => $this->avatar ? asset('storage/'.$this->avatar) : null,
            'order' => $this->order,
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => [
                    'name' => $this->name_ar ?? '',
                    'job_title' => $this->job_title_ar ?? '',
                    'quote' => $this->quote_ar ?? '',
                ],
                'en' => [
                    'name' => $this->name_en ?? '',
                    'job_title' => $this->job_title_en ?? '',
                    'quote' => $this->quote_en ?? '',
                ],
            ],
        ];
    }
}
