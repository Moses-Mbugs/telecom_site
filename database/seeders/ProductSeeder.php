<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $smartphones = Category::where('slug', 'smartphones')->first();
        $samsung = Brand::where('slug', 'samsung')->first();
        $apple = Brand::where('slug', 'apple')->first();

        Product::create([
            'name' => 'Samsung Galaxy A15',
            'slug' => Str::slug('Samsung Galaxy A15'),
            'description' => 'Affordable smartphone with long battery life.',
            'price' => 18000,
            'deposit_amount' => 2500,
            'monthly_payment' => 1500,
            'stock' => 25,
            'category_id' => $smartphones->id,
            'brand_id' => $samsung->id,
        ]);

        Product::create([
            'name' => 'Samsung Galaxy A25',
            'slug' => Str::slug('Samsung Galaxy A25'),
            'description' => 'Smooth performance with modern design.',
            'price' => 24000,
            'deposit_amount' => 3000,
            'monthly_payment' => 2000,
            'stock' => 18,
            'category_id' => $smartphones->id,
            'brand_id' => $samsung->id,
        ]);

        Product::create([
            'name' => 'iPhone 11',
            'slug' => Str::slug('iPhone 11'),
            'description' => 'Reliable Apple performance and camera quality.',
            'price' => 42000,
            'deposit_amount' => 5000,
            'monthly_payment' => 3500,
            'stock' => 10,
            'category_id' => $smartphones->id,
            'brand_id' => $apple->id,
        ]);
    }
}

