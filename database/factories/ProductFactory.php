<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        return [
            'name'            => ucwords($name),
            'slug'            => Str::slug($name),
            'description'     => fake()->paragraph(),
            'price'           => fake()->numberBetween(5000, 200000),
            'discount_price'  => null,
            'deposit_amount'  => null,
            'monthly_payment' => null,
            'stock'           => fake()->numberBetween(0, 50),
            'image'           => null,
            'category_id'     => Category::factory(),
            'brand_id'        => Brand::factory(),
            'is_featured'     => false,
            'deal_end_time'   => null,
        ];
    }

    public function featured(): static
    {
        return $this->state(['is_featured' => true]);
    }

    public function onDeal(): static
    {
        return $this->state(['deal_end_time' => now()->addDays(3)]);
    }

    public function discounted(): static
    {
        return $this->state(fn (array $attrs) => [
            'discount_price' => $attrs['price'] + fake()->numberBetween(1000, 20000),
        ]);
    }
}
