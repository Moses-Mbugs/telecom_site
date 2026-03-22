<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::redirect('/home', '/');
// Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::view('/welcome', 'welcome')->name('welcome');

Auth::routes();

Route::post('/topup', [TopUpController::class, 'topup'])->name('topup');



Route::view('/about', 'about')->name('about');
Route::get('/locations', [\App\Http\Controllers\HomeController::class, 'locations'])->name('locations');


// Shop Route
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/product/{slug}', [ShopController::class, 'show'])
    ->name('product.show');


// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');


Route::get('/checkout', [CartController::class, 'checkoutWhatsApp'])->name('checkout.index');
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
// Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

// Wishlist Routes
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{id}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Homepage Settings
    Route::get('/homepage', [\App\Http\Controllers\Admin\HomepageSettingController::class, 'index'])->name('homepage.index');
    Route::post('/homepage', [\App\Http\Controllers\Admin\HomepageSettingController::class, 'update'])->name('homepage.update');

    // Testimonials
    Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);

    // Products
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
});
