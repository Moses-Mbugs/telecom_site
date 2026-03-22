<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'content',
        'image_url',
        'rating',
    ];

    public function getAssetUrlAttribute()
    {
        if (!$this->image_url) {
            return null;
        }
        if (str_starts_with($this->image_url, 'http')) {
            return $this->image_url;
        }
        return asset('storage/' . $this->image_url);
    }
}
