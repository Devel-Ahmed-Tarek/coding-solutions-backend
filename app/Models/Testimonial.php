<?php

namespace App\Models;

use App\Support\HasBilingualAttributes;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasBilingualAttributes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'job_title_ar',
        'job_title_en',
        'quote_ar',
        'quote_en',
        'rating',
        'avatar',
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
