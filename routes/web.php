<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WishlistController;

// Home
Route::get('/', [HomeController::class, 'index']);


// Detail Produk
Route::get('/detail/product/{products:slug}', [ProductController::class, 'show']);


// Profile Toko
Route::get('/profile/store/{stores:slug}', [StoreController::class, 'show']);


// Middleware Auth

Route::middleware(['auth'])->group(function () {
    
    
    // Wishlists
    Route::post('/wishlist/add/product/{product:slug}', [WishlistController::class, 'addWishlist']);
    Route::post('/wishlist/remove/product/{product:slug}', [WishlistController::class, 'removeWishlist']);
    Route::get('/wishlists', [WishlistController::class, 'show']);


});


// Form Pemesanan
Route::get('/order/product/slug-product1', function() {
    return view('order.form');
});


// Buka Toko
Route::get('/store/create', function() {
    return view('store.create');
});


// Edit User
Route::get('/edit/profile/1', function() {
    return view('user.edit');
});

Auth::routes(['verify' => true]);
