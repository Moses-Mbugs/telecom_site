<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

it('shop index returns the shop view with products from the database', function () {
    $category = Category::factory()->create(['name' => 'Smartphones', 'slug' => 'smartphones']);
    $brand    = Brand::factory()->create(['name' => 'Nokia', 'slug' => 'nokia']);
    Product::factory()->create([
        'name'        => 'Test Phone',
        'slug'        => 'test-phone',
        'price'       => 29999,
        'stock'       => 10,
        'category_id' => $category->id,
        'brand_id'    => $brand->id,
    ]);

    $response = $this->get('/shop');

    $response->assertStatus(200);
    $response->assertViewIs('shop');
    $response->assertViewHas('products');
    $response->assertViewHas('categories');
    $response->assertViewHas('brands');
    $response->assertViewHas('featuredProducts');
    $response->assertViewHas('deals');
});

it('shop show returns 404 when product slug is not found in the database', function () {
    $response = $this->get('/product/non-existent-slug');

    $response->assertStatus(404);
});

it('shop show returns the product view when slug is found in the database', function () {
    $category = Category::factory()->create(['name' => 'Phones', 'slug' => 'phones']);
    $brand    = Brand::factory()->create(['name' => 'Samsung', 'slug' => 'samsung']);
    Product::factory()->create([
        'name'        => 'Samsung Galaxy',
        'slug'        => 'samsung-galaxy',
        'price'       => 59999,
        'stock'       => 5,
        'category_id' => $category->id,
        'brand_id'    => $brand->id,
    ]);

    $response = $this->get('/product/samsung-galaxy');

    $response->assertStatus(200);
    $response->assertViewIs('product-show');
    $response->assertViewHas('product');
});
