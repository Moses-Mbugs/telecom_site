<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\AfterSaleController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SdgController;
use App\Http\Controllers\MpesaEnquiryController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::redirect('/home', '/');

Auth::routes();

Route::post('/topup', [TopUpController::class, 'topup'])->name('topup');

Route::view('/about', 'about')->name('about');
Route::get('/locations', [HomeController::class, 'locations'])->name('locations');

// New public pages
Route::get('/after-sale-support', [AfterSaleController::class, 'index'])->name('after-sale-support');
Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/sdg', [SdgController::class, 'index'])->name('sdg');

// M-Pesa Enquiry
Route::post('/mpesa-enquiry', [MpesaEnquiryController::class, 'store'])->name('mpesa-enquiry.store');

// Shop Route
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])->name('product.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [CartController::class, 'checkoutWhatsApp'])->name('checkout.index');

// Wishlist Routes
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{id}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
    Route::post('/product/{slug}/reviews', [ProductReviewController::class, 'store'])->name('product.reviews.store');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Homepage Settings
    Route::get('/homepage', [\App\Http\Controllers\Admin\HomepageSettingController::class, 'index'])->name('homepage.index');
    Route::post('/homepage', [\App\Http\Controllers\Admin\HomepageSettingController::class, 'update'])->name('homepage.update');

    // Testimonials
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

    // Categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except(['show']);

    // Brands
    Route::resource('brands', \App\Http\Controllers\Admin\BrandController::class)->except(['show']);

    // Products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    // Locations
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class);

    // New admin resources
    Route::resource('careers', \App\Http\Controllers\Admin\CareerController::class)->except(['show']);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->except(['show']);
    Route::resource('events', \App\Http\Controllers\Admin\EventController::class)->except(['show']);
    Route::resource('sdg', \App\Http\Controllers\Admin\SdgController::class)->except(['show']);
    Route::resource('partners', \App\Http\Controllers\Admin\PartnerController::class)->except(['show']);

    // Enquiries (read + delete only)
    Route::get('enquiries', [\App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('enquiries.index');
    Route::delete('enquiries/{enquiry}', [\App\Http\Controllers\Admin\EnquiryController::class, 'destroy'])->name('enquiries.destroy');
});
