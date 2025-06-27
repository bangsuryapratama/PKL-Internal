<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\OrderController; // ✅ Untuk USER
use App\Http\Controllers\Backend\OrderController as BackendOrderController; // ✅ Untuk ADMIN
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

use App\Http\Middleware\Admin;

Auth::routes();

// =====================
// 🏠 HALAMAN UTAMA
// =====================
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// =====================
// 🛒 PRODUK
// =====================
Route::get('/product', [FrontendController::class, 'product'])->name('product.index');
Route::get('/product/{product}', [FrontendController::class, 'singleProduct'])->name('product.show');
Route::get('/product/category/{slug}', [FrontendController::class, 'filterByCategory'])->name('product.filter');
Route::get('/search', [FrontendController::class, 'search'])->name('product.search');

// =====================
// 🛍️ CART / KERANJANG
// =====================
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/delete/{id}', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');

// =====================
// 💳 CHECKOUT
// =====================
Route::get('/checkout', [CartController::class, 'showCheckoutPage'])->name('checkout.index');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

// =====================
// 👤 USER ORDER (FRONTEND)
// =====================
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// =====================
// 🔐 ADMIN ROUTES
// =====================
Route::group(['prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', Admin::class]], function () {
    Route::get('/', [BackendController::class, 'index']);

    // ✅ ADMIN ORDERS
    Route::get('/orders', [BackendOrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{id}', [BackendOrderController::class, 'show'])->name('order.show');
    Route::delete('/orders/{id}', [BackendOrderController::class, 'destroy'])->name('order.destroy');
    Route::put('/orders/{id}/status', [BackendOrderController::class, 'updateStatus'])->name('order.updateStatus');

    // ✅ ADMIN CRUD
    Route::resource('/category', CategoryController::class);
    Route::resource('/product', ProductController::class);
});
