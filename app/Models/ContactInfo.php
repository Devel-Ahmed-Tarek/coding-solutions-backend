<?php

namespace App\Models;

use App\Support\HasBilingualAttributes;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasBilingualAttributes;

    protected $fillable = [
        'email',
        'phone',
        'whatsapp',
        'address_ar',
        'address_en',
        'address_de',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'logo',
        'company_name_ar',
        'company_name_en',
        'company_name_de',
        'about_text_ar',
        'about_text_en',
        'about_text_de',
    ];
}
