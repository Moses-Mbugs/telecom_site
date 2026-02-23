# Strapi API Endpoint Mapping

This document outlines the proposed Strapi Content Types and API endpoints required to manage the content for the Safe World Telecom website.

## 1. Global Content
Content that appears across multiple pages (Header, Footer, Navigation).

| Section | Strapi Content Type | Endpoint | Fields/Notes |
|---------|---------------------|----------|--------------|
| **Navigation** | `Navigation` (Plugin) or `Menu` (Collection) | `GET /api/menus?nested` | Links for Header and Side Nav (About, Services, Locations, Contact). |
| **Categories** | `Category` (Collection) | `GET /api/categories` | Name, Slug, Icon (optional). Used in Side Nav and Shop Sidebar. |
| **Brands** | `Brand` (Collection) | `GET /api/brands?populate=logo` | Name, Slug, Logo. Used in Shop Sidebar and Trusted Brands section. |

---

## 2. Welcome Page (`welcome.blade.php`)
Managed via a Single Type named `Homepage`.

**Endpoint:** `GET /api/homepage?populate=deep`

| Section | Component Name | Fields |
|---------|----------------|--------|
| **Hero Section** | `hero` | `backgroundImage` (Media), `title` (Text), `subtitle` (Text), `buttons` (Component: label, link, style). |
| **Stats Footer** | `stats` | Repeater: `number` (Text), `label` (Text). |
| **Our Story** | `story` | `image` (Media), `title` (Text), `description` (Rich Text), `link` (Text). |
| **Timeline** | `timeline` | Repeater: `year` (Text), `title` (Text), `description` (Text). |
| **Ads Slideshow** | `adSlideshow` | Repeater: `image` (Media), `badge` (Text), `title` (Text), `description` (Text), `link` (Text). |
| **Quick Top-Up** | `topUpSection` | `title` (Text), `description` (Text), `features` (Repeater: label, value). |
| **Explore Devices** | `exploreSection` | `backgroundImage` (Media), `title` (Text), `buttons` (Component). |
| **Why Choose Us** | `features` | Repeater: `icon` (Media/Enum), `title` (Text), `description` (Text). |
| **Reviews** | `reviews` | Relation to `Review` Collection (or simple repeater if manual). |

---

## 3. Shop Page (`shop.blade.php`)
Managed via a Single Type named `ShopPage` and `Product` Collection.

**Page Config Endpoint:** `GET /api/shop-page?populate=deep`

| Section | Component/Field | Fields |
|---------|-----------------|--------|
| **Top Ad Strip** | `topAlert` | `content` (Text), `backgroundColor` (String), `isActive` (Boolean). |
| **Sidebar Banner** | `sidebarBanner` | `title` (Text), `discount` (Text), `code` (Text), `description` (Text), `backgroundImage` (Media). |

### Product Sections (Dynamic Data)

| Section | Strapi Collection | Endpoint | Filters/Logic |
|---------|-------------------|----------|---------------|
| **Featured Products** | `Product` | `GET /api/products?filters[is_featured][$eq]=true&populate=*` | Carousel items. |
| **Latest Deals** | `Product` | `GET /api/products?filters[deal_end_time][$notNull]=true&sort=deal_end_time:asc&populate=*` | Products with active deals. |
| **Flash Sales** | `Product` | `GET /api/products?filters[is_flash_sale][$eq]=true&populate=*` | *New field needed in Strapi*. |
| **All Products** | `Product` | `GET /api/products?populate=*` | Main grid with pagination, search, and filters. |

---

## 4. Product Schema (`Product` Collection)
Proposed schema for the `Product` collection in Strapi.

| Field Name | Type | Notes |
|------------|------|-------|
| `name` | Text | Product Name. |
| `slug` | UID | Unique identifier (from name). |
| `description` | Rich Text | Full product description. |
| `price` | Decimal | Base price. |
| `discount_price` | Decimal | Sale price (if applicable). |
| `deposit_amount` | Decimal | For installment plans. |
| `monthly_payment` | Decimal | For installment plans. |
| `stock` | Integer | Inventory count. |
| `is_featured` | Boolean | Toggle for Featured Carousel. |
| `deal_end_time` | DateTime | Expiration for deals. |
| `images` | Media (Multiple) | Product gallery. |
| `category` | Relation | Belongs to one Category. |
| `brand` | Relation | Belongs to one Brand. |
| `specifications` | Component | Key-value pairs (e.g., RAM: 8GB, Storage: 128GB). |

---

## 5. Implementation Strategy (Future)

1.  **Setup Strapi**: Create the Content Types listed above.
2.  **Populate Data**: Migrate existing hardcoded data and database records to Strapi.
3.  **Frontend Integration**:
    *   Create a `StrapiService` in Laravel to handle API requests.
    *   Replace `Product::all()` calls in Controllers with `StrapiService::getProducts()`.
    *   Pass data to Views exactly as before (maintaining variable names to avoid breaking Blade files).
4.  **Caching**: Implement caching (Redis/File) for API responses to ensure performance (don't hit Strapi on every page load).
