<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'whatsapp',
        'address',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'youtube',
        'logo',
        'company_name',
        'about_text',
    ];
}
