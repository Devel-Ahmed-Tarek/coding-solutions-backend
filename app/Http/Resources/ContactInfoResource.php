<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactInfoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'address' => $this->localizedValue('address'),
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'logo' => $this->logo ? asset('storage/'.$this->logo) : null,
            'company_name' => $this->localizedValue('company_name'),
            'about_text' => $this->localizedValue('about_text'),
            'locale' => app()->getLocale(),
            'translations' => [
                'ar' => [
                    'company_name' => $this->company_name_ar ?? '',
                    'about_text' => $this->about_text_ar ?? '',
                    'address' => $this->address_ar ?? '',
                ],
                'en' => [
                    'company_name' => $this->company_name_en ?? '',
                    'about_text' => $this->about_text_en ?? '',
                    'address' => $this->address_en ?? '',
                ],
                'de' => [
                    'company_name' => $this->company_name_de ?? '',
                    'about_text' => $this->about_text_de ?? '',
                    'address' => $this->address_de ?? '',
                ],
            ],
        ];
    }
}
