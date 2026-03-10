<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class StrapiService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.strapi.url', 'http://localhost:1337');
    }

    /**
     * Transform a single Strapi item (v4 or v5) into a plain object
     * whose properties match what the Blade templates expect.
     *
     * Strapi v4 wraps fields inside an 'attributes' key.
     * Strapi v5 returns fields at the top level of the item.
     */
    protected function transformProduct(array $item): object
    {
        $attrs = array_key_exists('attributes', $item) ? $item['attributes'] : $item;

        $obj                  = new \stdClass();
        $obj->id              = $item['id'] ?? null;
        $obj->name            = $attrs['name'] ?? null;
        $obj->slug            = $attrs['slug'] ?? null;
        $obj->description     = $attrs['description'] ?? null;
        $obj->price           = $attrs['price'] ?? 0;
        $obj->discount_price  = $attrs['discount_price'] ?? null;
        $obj->deposit_amount  = $attrs['deposit_amount'] ?? null;
        $obj->monthly_payment = $attrs['monthly_payment'] ?? null;
        $obj->stock           = $attrs['stock'] ?? 0;
        $obj->is_featured     = $attrs['is_featured'] ?? false;
        $obj->deal_end_time   = $attrs['deal_end_time'] ?? null;
        $obj->image           = $this->extractImageUrl($attrs);
        $obj->category        = $this->extractRelation($attrs['category'] ?? null);
        $obj->brand           = $this->extractRelation($attrs['brand'] ?? null);

        return $obj;
    }

    /**
     * Extract an absolute image URL from Strapi's image/images field.
     * Handles both Strapi v4 (nested under 'data') and v5 (flat) formats.
     */
    protected function extractImageUrl(array $attrs): ?string
    {
        $raw = $attrs['image'] ?? $attrs['images'] ?? null;

        if ($raw === null) {
            return null;
        }

        // Strapi v4: { data: { id, attributes: { url } } }  or  { data: [ { ... } ] }
        if (array_key_exists('data', $raw)) {
            $data = $raw['data'];
            if (!$data) {
                return null;
            }
            // Distinguish a list of items (numeric keys) from a single item (string keys)
            $node = isset($data[0]) ? $data[0] : $data;
            $url  = $node['attributes']['url'] ?? ($node['url'] ?? null);
        } else {
            // Strapi v5 or a direct object/array: { url: '...' } or [ { url: '...' }, ... ]
            $node = isset($raw[0]) ? $raw[0] : $raw;
            $url  = $node['url'] ?? null;
        }

        if (!$url) {
            return null;
        }

        return str_starts_with($url, 'http') ? $url : $this->baseUrl . $url;
    }

    /**
     * Extract a Strapi relationship (e.g. category, brand) and return a
     * plain object with the relation's id and all its scalar attributes.
     */
    protected function extractRelation(?array $relation): ?object
    {
        if (empty($relation)) {
            return null;
        }

        // Strapi v4: { data: { id, attributes: { name, ... } } }
        if (array_key_exists('data', $relation)) {
            $data = $relation['data'];
            if (!$data) {
                return null;
            }
            $relAttrs       = $data['attributes'] ?? $data;
            $obj            = new \stdClass();
            $obj->id        = $data['id'] ?? null;
            foreach ($relAttrs as $key => $value) {
                $obj->{$key} = $value;
            }
            return $obj;
        }

        // Strapi v5 / direct object: { id, name, ... }
        if (isset($relation['id'])) {
            return (object) $relation;
        }

        return null;
    }

    /**
     * Fetch a paginated list of products with optional filters and sorting.
     */
    public function getProducts(array $params = []): LengthAwarePaginator
    {
        $page     = (int) ($params['page'] ?? 1);
        $pageSize = (int) ($params['pageSize'] ?? 9);

        $query = [
            'populate'             => '*',
            'pagination[page]'     => $page,
            'pagination[pageSize]' => $pageSize,
        ];

        if (!empty($params['search'])) {
            $query['filters[$or][0][name][$containsi]']        = $params['search'];
            $query['filters[$or][1][description][$containsi]'] = $params['search'];
        }

        if (!empty($params['category'])) {
            $query['filters[category][id][$eq]'] = $params['category'];
        }

        if (!empty($params['brand'])) {
            $query['filters[brand][id][$eq]'] = $params['brand'];
        }

        if (!empty($params['featured'])) {
            $query['filters[is_featured][$eq]'] = 'true';
        }

        if (!empty($params['min_price'])) {
            $query['filters[price][$gte]'] = $params['min_price'];
        }

        if (!empty($params['max_price'])) {
            $query['filters[price][$lte]'] = $params['max_price'];
        }

        $sortMap        = ['price_asc' => 'price:asc', 'price_desc' => 'price:desc'];
        $query['sort']  = $sortMap[$params['sort'] ?? ''] ?? 'createdAt:desc';

        $response = Http::get($this->baseUrl . '/api/products', $query);

        if ($response->failed()) {
            return new LengthAwarePaginator([], 0, $pageSize, $page, [
                'path'  => request()->url(),
                'query' => request()->query(),
            ]);
        }

        $json  = $response->json();
        $items = collect(array_map([$this, 'transformProduct'], $json['data'] ?? []));
        $meta  = $json['meta']['pagination'] ?? [];
        $total = (int) ($meta['total'] ?? $items->count());

        return new LengthAwarePaginator($items, $total, $pageSize, $page, [
            'path'  => request()->url(),
            'query' => request()->query(),
        ]);
    }

    /**
     * Fetch featured products for the carousel section.
     */
    public function getFeaturedProducts(int $limit = 8): Collection
    {
        $response = Http::get($this->baseUrl . '/api/products', [
            'populate'                  => '*',
            'filters[is_featured][$eq]' => 'true',
            'sort'                      => 'createdAt:desc',
            'pagination[pageSize]'      => $limit,
        ]);

        if ($response->failed()) {
            return collect();
        }

        return collect(array_map([$this, 'transformProduct'], $response->json()['data'] ?? []));
    }

    /**
     * Fetch active deals (products with a future deal_end_time).
     */
    public function getDeals(int $limit = 4): Collection
    {
        $response = Http::get($this->baseUrl . '/api/products', [
            'populate'                         => '*',
            'filters[deal_end_time][$notNull]'  => 'true',
            'filters[deal_end_time][$gt]'       => now()->toISOString(),
            'sort'                             => 'deal_end_time:asc',
            'pagination[pageSize]'             => $limit,
        ]);

        if ($response->failed()) {
            return collect();
        }

        return collect(array_map([$this, 'transformProduct'], $response->json()['data'] ?? []));
    }

    /**
     * Fetch all categories ordered by name.
     */
    public function getCategories(): Collection
    {
        $response = Http::get($this->baseUrl . '/api/categories', [
            'sort'                 => 'name:asc',
            'pagination[pageSize]' => 100,
        ]);

        if ($response->failed()) {
            return collect();
        }

        $items = array_map(function (array $item): object {
            $attrs     = array_key_exists('attributes', $item) ? $item['attributes'] : $item;
            $obj       = new \stdClass();
            $obj->id   = $item['id'];
            $obj->name = $attrs['name'] ?? null;
            return $obj;
        }, $response->json()['data'] ?? []);

        return collect($items);
    }

    /**
     * Fetch all brands ordered by name, with product counts where available.
     */
    public function getBrands(): Collection
    {
        $response = Http::get($this->baseUrl . '/api/brands', [
            'sort'                      => 'name:asc',
            'pagination[pageSize]'      => 100,
            'populate[products][count]' => 'true',
        ]);

        if ($response->failed()) {
            return collect();
        }

        $items = array_map(function (array $item): object {
            $attrs               = array_key_exists('attributes', $item) ? $item['attributes'] : $item;
            $obj                 = new \stdClass();
            $obj->id             = $item['id'];
            $obj->name           = $attrs['name'] ?? null;
            $products            = $attrs['products'] ?? null;
            $obj->products_count = null;
            if (is_array($products)) {
                $obj->products_count = isset($products['data'])
                    ? count($products['data'])
                    : count($products);
            }
            return $obj;
        }, $response->json()['data'] ?? []);

        return collect($items);
    }

    /**
     * Find a single product by its slug.
     */
    public function getProductBySlug(string $slug): ?object
    {
        $response = Http::get($this->baseUrl . '/api/products', [
            'populate'             => '*',
            'filters[slug][$eq]'   => $slug,
            'pagination[pageSize]' => 1,
        ]);

        if ($response->failed()) {
            return null;
        }

        $items = $response->json()['data'] ?? [];

        return !empty($items) ? $this->transformProduct($items[0]) : null;
    }

    /**
     * Fetch a product by its Strapi numeric ID.
     */
    public function getProductById(int $id): ?object
    {
        $response = Http::get($this->baseUrl . '/api/products/' . $id, [
            'populate' => '*',
        ]);

        if ($response->failed()) {
            return null;
        }

        $item = $response->json()['data'] ?? null;

        return $item ? $this->transformProduct($item) : null;
    }

    /**
     * Fetch multiple products by an array of Strapi IDs in a single request.
     * Returns a Collection keyed by product ID.
     */
    public function getProductsByIds(array $ids): Collection
    {
        if (empty($ids)) {
            return collect();
        }

        $query = ['populate' => '*', 'pagination[pageSize]' => count($ids)];

        foreach (array_values($ids) as $i => $id) {
            $query['filters[id][$in][' . $i . ']'] = $id;
        }

        $response = Http::get($this->baseUrl . '/api/products', $query);

        if ($response->failed()) {
            return collect();
        }

        return collect(array_map([$this, 'transformProduct'], $response->json()['data'] ?? []))
            ->keyBy('id');
    }
}
