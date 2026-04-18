<?php

namespace App\Models;

use App\Support\HasBilingualAttributes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasBilingualAttributes;

    protected $fillable = [
        'title_ar',
        'title_en',
        'title_de',
        'description_ar',
        'description_en',
        'description_de',
        'slug_ar',
        'slug_en',
        'slug_de',
        'category_ar',
        'category_en',
        'category_de',
        'icon',
        'image',
        'order',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
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
