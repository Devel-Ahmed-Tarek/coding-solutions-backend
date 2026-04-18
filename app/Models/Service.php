<?php

namespace App\Models;

use App\Support\HasBilingualAttributes;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasBilingualAttributes;

    protected $fillable = [
        'icon',
        'title_ar',
        'title_en',
        'title_de',
        'description_ar',
        'description_en',
        'description_de',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order')->orderBy('id');
    }
}
