<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Store\StoreDashboardController;

// Home
Route::get('/', [HomeController::class, 'index']);


// Detail Produk
Route::get('/detail/product/{product:slug}', [ProductController::class, 'show']);


// Profile Toko
Route::get('/profile/store/{stores:slug}', [StoreController::class, 'show']);


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
        

        Route::get('/dashboard', [StoreDashboardController::class, 'index']);


    });
    


    // Order Produk
    Route::get('/product/{product:slug}/order', [ProductController::class, 'orderView']);
    Route::post('/product/{product:slug}/order', [ProductController::class, 'orderProduct']);


});


Auth::routes(['verify' => true]);
