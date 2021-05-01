<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

// Store
use App\Http\Controllers\Store\StoreDashboardController;
use App\Http\Controllers\Store\StoreProductController;



// Home
Route::get('/', [HomeController::class, 'index']);


// Detail Produk
Route::get('/detail/product/{product:slug}', [ProductController::class, 'show']);


// Profile Toko
Route::get('/profile/store/{store:slug}', [StoreController::class, 'show']);



// Middleware Auth

Route::middleware(['auth'])->group(function () {
    
    
    // Wishlists
    Route::post('/wishlist/add/product/{product:slug}', [WishlistController::class, 'addWishlist']);
    Route::post('/wishlist/remove/product/{product:slug}', [WishlistController::class, 'removeWishlist']);
    Route::get('/wishlists', [WishlistController::class, 'show']);


    // User
    Route::get('/user/profile/edit', [UserController::class, 'editUser']);
    Route::post('/user/profile/edit', [UserController::class, 'updateUser']);


    // Permission create store
    Route::middleware('permission:create-store')->group(function() {

        // Buka Toko
        Route::get('/store/create', [StoreController::class, 'create']);
        Route::post('/store/create', [StoreController::class, 'store']);
        
    });


    // Dashboard store
    Route::middleware('role:merchant')->prefix('store')->group(function () {
        

        // Dashboard
        Route::get('/dashboard', [StoreDashboardController::class, 'index']);

        // Products
        Route::get('/products', [StoreProductController::class, 'index']);
        Route::get('/products/create', [StoreProductController::class, 'create']);
        Route::post('/products', [StoreProductController::class, 'store']);
        Route::get('/products/{product}/edit', [StoreProductController::class, 'edit']);
        Route::put('/products/{product}', [StoreProductController::class, 'update']);
        Route::delete('/products/{product}', [StoreProductController::class, 'destroy']);
        Route::get('/products/{product}', [StoreProductController::class, 'show']);

        // Store
        Route::get('/profile', [StoreController::class, 'show']);
        Route::get('/profile/edit', [StoreController::class, 'edit']);
        Route::put('/profile/edit', [StoreController::class, 'update']);


    });
    


    // Order Produk
    Route::get('/product/{product:slug}/order', [OrderController::class, 'orderView']);
    Route::post('/product/{product:slug}/order', [OrderController::class, 'orderProduct']);


});


Auth::routes(['verify' => true]);

