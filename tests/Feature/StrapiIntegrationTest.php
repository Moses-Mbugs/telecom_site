<?php

use App\Services\StrapiService;
use Illuminate\Support\Facades\Http;

it('shop index fetches products from strapi and returns the shop view', function () {
    Http::fake([
        '*/api/products*' => Http::response([
            'data' => [
                [
                    'id' => 1,
                    'attributes' => [
                        'name'  => 'Test Phone',
                        'slug'  => 'test-phone',
                        'price' => 29999,
                        'stock' => 10,
                        'is_featured' => false,
                        'category' => ['data' => ['id' => 1, 'attributes' => ['name' => 'Smartphones']]],
                        'brand'    => ['data' => ['id' => 1, 'attributes' => ['name' => 'Nokia']]],
                    ],
                ],
            ],
            'meta' => ['pagination' => ['page' => 1, 'pageSize' => 9, 'pageCount' => 1, 'total' => 1]],
        ], 200),
        '*/api/categories*' => Http::response(['data' => [], 'meta' => ['pagination' => []]], 200),
        '*/api/brands*'     => Http::response(['data' => [], 'meta' => ['pagination' => []]], 200),
        '*/api/shop-page*'  => Http::response(['data' => null], 200),
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

it('shop show returns 404 when product slug not found in strapi', function () {
    Http::fake([
        '*/api/products*' => Http::response(['data' => [], 'meta' => ['pagination' => []]], 200),
    ]);

    $response = $this->get('/product/non-existent-slug');

    $response->assertStatus(404);
});

it('shop show returns the product view when slug is found in strapi', function () {
    Http::fake([
        '*/api/products*' => Http::response([
            'data' => [
                [
                    'id' => 2,
                    'attributes' => [
                        'name'  => 'Samsung Galaxy',
                        'slug'  => 'samsung-galaxy',
                        'price' => 59999,
                        'stock' => 5,
                        'category' => ['data' => ['id' => 1, 'attributes' => ['name' => 'Phones']]],
                        'brand'    => ['data' => ['id' => 2, 'attributes' => ['name' => 'Samsung']]],
                    ],
                ],
            ],
            'meta' => ['pagination' => ['page' => 1, 'pageSize' => 1, 'pageCount' => 1, 'total' => 1]],
        ], 200),
        '*/api/brands*'    => Http::response(['data' => [], 'meta' => ['pagination' => []]], 200),
        '*/api/shop-page*' => Http::response(['data' => null], 200),
    ]);

    $response = $this->get('/product/samsung-galaxy');

    $response->assertStatus(200);
    $response->assertViewIs('product-show');
    $response->assertViewHas('product');
});

it('strapi service transforms v4 product data correctly', function () {
    Http::fake([
        '*/api/products/1*' => Http::response([
            'data' => [
                'id' => 1,
                'attributes' => [
                    'name'          => 'Test Phone',
                    'slug'          => 'test-phone',
                    'price'         => 29999,
                    'stock'         => 10,
                    'is_featured'   => true,
                    'deal_end_time' => null,
                    'image'         => ['data' => ['id' => 1, 'attributes' => ['url' => '/uploads/test.jpg']]],
                    'category'      => ['data' => ['id' => 1, 'attributes' => ['name' => 'Smartphones']]],
                    'brand'         => ['data' => ['id' => 1, 'attributes' => ['name' => 'Nokia']]],
                ],
            ],
        ], 200),
    ]);

    $service = app(StrapiService::class);
    $product = $service->getProductById(1);

    expect($product)->not->toBeNull();
    expect($product->id)->toBe(1);
    expect($product->name)->toBe('Test Phone');
    expect($product->slug)->toBe('test-phone');
    expect($product->price)->toBe(29999);
    expect($product->stock)->toBe(10);
    expect($product->is_featured)->toBe(true);
    expect($product->image)->not->toBeNull();
    expect(str_contains($product->image, '/uploads/test.jpg'))->toBeTrue();
    expect($product->category->name)->toBe('Smartphones');
    expect($product->brand->name)->toBe('Nokia');
});

it('strapi service returns null when product is not found', function () {
    Http::fake([
        '*/api/products*' => Http::response([
            'data'  => null,
            'error' => ['status' => 404, 'name' => 'NotFoundError', 'message' => 'Not Found'],
        ], 404),
    ]);

    $service = app(StrapiService::class);
    $product = $service->getProductById(999);

    expect($product)->toBeNull();
});

it('strapi service returns empty collection when strapi is unreachable', function () {
    Http::fake([
        '*' => Http::response([], 500),
    ]);

    $service  = app(StrapiService::class);
    $products = $service->getProducts();

    expect($products->total())->toBe(0);
    expect($products->items())->toBeEmpty();
});
