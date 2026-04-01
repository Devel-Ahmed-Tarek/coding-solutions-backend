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
            'address' => $this->address,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'logo' => $this->logo ? asset('storage/' . $this->logo) : null,
            'company_name' => $this->company_name,
            'about_text' => $this->about_text,
        ];
    }
}
