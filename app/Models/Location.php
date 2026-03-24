<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'image_url', 'map_embed_url'];

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
