<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'deposit_amount',
        'monthly_payment',
        'stock',
        'image',
        'category_id',
        'brand_id',
        'is_featured',
        'discount_price',
        'deal_end_time',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'deal_end_time' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
