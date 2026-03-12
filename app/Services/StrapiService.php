<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class StrapiService
{
    protected string $baseUrl;
    protected ?string $apiToken;

    public function __construct()
    {
        $this->baseUrl  = config('services.strapi.url', 'http://localhost:1337');
        $this->apiToken = config('services.strapi.token') ?: null;
    }

    // -------------------------------------------------------------------------
    // Transformers
    // -------------------------------------------------------------------------

    /**
     * Transform a single Strapi item (v4 or v5) into a plain object
     * whose properties match what the Blade templates expect.
     */
    protected function transformProduct(array $item): object
    {
        $attrs = array_key_exists('attributes', $item) ? $item['attributes'] : $item;

        $obj                  = new \stdClass();
        $obj->id              = $item['id'] ?? null;
        $obj->name            = $attrs['name'] ?? null;
        $obj->slug            = $attrs['slug'] ?? null;
        $obj->description = $this->extractPlainText($attrs['description'] ?? '');
        $obj->price           = $attrs['price'] ?? 0;
        $obj->discount_price  = $attrs['discount_price'] ?? null;
        $obj->deposit_amount  = $attrs['deposit_amount'] ?? null;
        $obj->monthly_payment = $attrs['monthly_payment'] ?? null;
        $obj->stock           = $attrs['stock'] ?? 0;
        $obj->is_featured     = $attrs['is_featured'] ?? false;
        $obj->is_flash_sale   = $attrs['is_flash_sale'] ?? false;
        $obj->deal_end_time   = $attrs['deal_end_time'] ?? null;
        $obj->specifications  = $attrs['specifications'] ?? [];
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

        if (array_key_exists('data', $raw)) {
            $data = $raw['data'];
            if (!$data) {
                return null;
            }
            $node = isset($data[0]) ? $data[0] : $data;
            $url  = $node['attributes']['url'] ?? ($node['url'] ?? null);
        } else {
            $node = isset($raw[0]) ? $raw[0] : $raw;
            $url  = $node['url'] ?? null;
        }

        if (!$url) {
            return null;
        }

        return str_starts_with($url, 'http') ? $url : $this->baseUrl . $url;
    }

    /**
     * Extract a Strapi relationship and return a plain object.
     */
    protected function extractRelation(?array $relation): ?object
    {
        if (empty($relation)) {
            return null;
        }

        if (array_key_exists('data', $relation)) {
            $data = $relation['data'];
            if (!$data) {
                return null;
            }
            $relAttrs = $data['attributes'] ?? $data;
            $obj      = new \stdClass();
            $obj->id  = $data['id'] ?? null;
            foreach ($relAttrs as $key => $value) {
                $obj->{$key} = $value;
            }
            return $obj;
        }

        if (isset($relation['id'])) {
            return (object) $relation;
        }

        return null;
    }

    /**
     * Extract a media URL from a Strapi media field (used for non-product media).
     */
    protected function extractMediaUrl(?array $field): ?string
    {
        if (empty($field)) {
            return null;
        }

        // v4: { data: { attributes: { url } } }
        if (isset($field['data']['attributes']['url'])) {
            $url = $field['data']['attributes']['url'];
            return str_starts_with($url, 'http') ? $url : $this->baseUrl . $url;
        }

        // v5: { url: '...' }
        if (isset($field['url'])) {
            $url = $field['url'];
            return str_starts_with($url, 'http') ? $url : $this->baseUrl . $url;
        }

        return null;
    }

    // -------------------------------------------------------------------------
    // Products
    // -------------------------------------------------------------------------

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

        $sortMap       = ['price_asc' => 'price:asc', 'price_desc' => 'price:desc'];
        $query['sort'] = $sortMap[$params['sort'] ?? ''] ?? 'createdAt:desc';

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
            'populate'                        => '*',
            'filters[deal_end_time][$notNull]' => 'true',
            'filters[deal_end_time][$gt]'      => now()->toISOString(),
            'sort'                            => 'deal_end_time:asc',
            'pagination[pageSize]'            => $limit,
        ]);

        if ($response->failed()) {
            return collect();
        }

        return collect(array_map([$this, 'transformProduct'], $response->json()['data'] ?? []));
    }

    /**
     * Fetch flash sale products.
     */
    public function getFlashSales(int $limit = 4): Collection
    {
        $response = Http::get($this->baseUrl . '/api/products', [
            'populate'                    => '*',
            'filters[is_flash_sale][$eq]' => 'true',
            'sort'                        => 'createdAt:desc',
            'pagination[pageSize]'        => $limit,
        ]);

        if ($response->failed()) {
            return collect();
        }

        return collect(array_map([$this, 'transformProduct'], $response->json()['data'] ?? []));
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
            $fallback = Http::get($this->baseUrl . '/api/products', [
                'populate'             => '*',
                'filters[id][$eq]'     => $id,
                'pagination[pageSize]' => 1,
            ]);

            if ($fallback->failed()) {
                return null;
            }

            $items = $fallback->json()['data'] ?? [];
            return !empty($items) ? $this->transformProduct($items[0]) : null;
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

    // -------------------------------------------------------------------------
    // Orders
    // -------------------------------------------------------------------------

    /**
     * Create a new order record in Strapi.
     *
     * Expected $data keys:
     *   - order_number   (string)  Unique order ID, e.g. "ORD-12345"
     *   - customer_email (string)  Buyer's email (optional for WhatsApp checkout)
     *   - products       (array)   Snapshot of cart items
     *   - total_amount   (float)   Final total
     *   - status         (string)  "pending" | "processing" | "shipped" | "delivered" | "cancelled"
     *   - payment_status (string)  "unpaid" | "paid" | "refunded"
     *   - shipping_address (array) Address component fields (optional)
     */
    public function createOrder(array $data): ?array
    {
        $request = Http::when(
            $this->apiToken,
            fn ($http) => $http->withToken($this->apiToken)
        );

        $response = $request->post($this->baseUrl . '/api/orders', [
            'data' => $data,
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }

    // -------------------------------------------------------------------------
    // Categories & Brands
    // -------------------------------------------------------------------------

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
            $obj->slug = $attrs['slug'] ?? null;
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
            $obj->slug           = $attrs['slug'] ?? null;
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

    // -------------------------------------------------------------------------
    // Single Types (Page Content)
    // -------------------------------------------------------------------------

    /**
     * Fetch the Homepage single type content.
     * Endpoint: GET /api/homepage?populate=deep
     */
    public function getHomepage(): ?object
    {
        $response = Http::get($this->baseUrl . '/api/homepage', [
            'populate' => 'deep',
        ]);

        if ($response->failed()) {
            return null;
        }

        $raw   = $response->json()['data'] ?? null;
        if (!$raw) {
            return null;
        }

        $attrs = array_key_exists('attributes', $raw) ? $raw['attributes'] : $raw;
        $obj   = new \stdClass();

        // Hero
        $obj->hero_title      = $attrs['hero_title'] ?? null;
        $obj->hero_subtitle   = $attrs['hero_subtitle'] ?? null;
        $obj->hero_background = $this->extractMediaUrl($attrs['hero_background'] ?? null);

        // Stats (repeatable component)
        $obj->stats = $attrs['stats'] ?? [];

        // Story
        $obj->story_title       = $attrs['story_title'] ?? null;
        $obj->story_description = $attrs['story_description'] ?? null;
        $obj->story_image       = $this->extractMediaUrl($attrs['story_image'] ?? null);
        $obj->story_link        = $attrs['story_link'] ?? null;

        // Timeline (repeatable component)
        $obj->timeline = $attrs['timeline'] ?? [];

        // Ad Slideshow (repeatable component)
        $obj->ad_slideshow = array_map(function (array $slide): object {
            $s              = new \stdClass();
            $s->badge       = $slide['badge'] ?? null;
            $s->title       = $slide['title'] ?? null;
            $s->description = $slide['description'] ?? null;
            $s->link        = $slide['link'] ?? null;
            $s->image       = $this->extractMediaUrl($slide['image'] ?? null);
            return $s;
        }, $attrs['adSlideshow'] ?? []);

        // Top-Up Section
        $obj->top_up_title       = $attrs['topUpSection']['title'] ?? null;
        $obj->top_up_description = $attrs['topUpSection']['description'] ?? null;
        $obj->top_up_features    = $attrs['topUpSection']['features'] ?? [];

        // Explore Section
        $obj->explore_title      = $attrs['exploreSection']['title'] ?? null;
        $obj->explore_background = $this->extractMediaUrl($attrs['exploreSection']['backgroundImage'] ?? null);
        $obj->explore_buttons    = $attrs['exploreSection']['buttons'] ?? [];

        // Why Choose Us / Features (repeatable component)
        $obj->features = $attrs['features'] ?? [];

        // Reviews (repeatable component or relation)
        $obj->reviews = $attrs['reviews'] ?? [];

        return $obj;
    }

    /**
     * Fetch the ShopPage single type content.
     * Endpoint: GET /api/shop-page?populate=deep
     */
    public function getShopPage(): ?object
    {
        $response = Http::get($this->baseUrl . '/api/shop-page', [
            'populate' => 'deep',
        ]);

        if ($response->failed()) {
            return null;
        }

        $raw = $response->json()['data'] ?? null;
        if (!$raw) {
            return null;
        }

        $attrs = array_key_exists('attributes', $raw) ? $raw['attributes'] : $raw;
        $obj   = new \stdClass();

        // Top Alert Strip
        $obj->top_alert_content = $attrs['top_alert_content'] ?? null;
        $obj->top_alert_color   = $attrs['top_alert_color'] ?? '#000000';
        $obj->top_alert_active  = $attrs['top_alert_active'] ?? false;

        // Sidebar Banner
        $obj->sidebar_banner_title       = $attrs['sidebar_banner_title'] ?? null;
        $obj->sidebar_banner_discount    = $attrs['sidebar_banner_discount'] ?? null;
        $obj->sidebar_banner_code        = $attrs['sidebar_banner_code'] ?? null;
        $obj->sidebar_banner_description = $attrs['sidebar_banner_description'] ?? null;
        $obj->sidebar_banner_image       = $this->extractMediaUrl($attrs['sidebar_banner_image'] ?? null);

        return $obj;
    }

    protected function extractPlainText(mixed $value): string
    {
        if (is_string($value)) return $value;
        if (!is_array($value)) return '';

        return collect($value)
            ->pluck('children')
            ->flatten(1)
            ->pluck('text')
            ->filter()
            ->implode(' ');
    }
}
