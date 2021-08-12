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

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/maintanace', function() {
    return view('maintanace.maintanace');
});

// Home
Route::get('/', [HomeController::class, 'index']);


// About
Route::view('/about', 'about.about');


// Detail Produk
Route::get('/detail/product/{product:slug}', [ProductController::class, 'show']);


// Profile Toko
Route::get('/profile/store/{store:slug}', [StoreController::class, 'show']);


// Lupa Password
Route::get('/forgot-password', function() {
    return view('auth.passwords.email');
});


// Middleware Auth

Route::middleware(['auth'])->group(function () {
    
    
    // Wishlists
    Route::post('/wishlist/add/product/{product:slug}', [WishlistController::class, 'addWishlist']);
    Route::post('/wishlist/remove/product/{product:slug}', [WishlistController::class, 'removeWishlist']);
    Route::get('/wishlists', [WishlistController::class, 'show']);


    // User
    Route::get('/user/profile/edit', [UserController::class, 'editUser']);
    Route::post('/user/profile/edit', [UserController::class, 'updateUser']);
    Route::get('/change-password', [UserController::class, 'editPassword']);
    Route::post('/change-password', [UserController::class, 'updatePassword']);


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



    // Dashboard Admin
    Route::middleware('role:admin')->prefix('admin')->group(function() {

        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);


        // Profile
        Route::get('/profile/edit', [ProfileController::class, 'edit']);
        Route::put('/profile/edit', [ProfileController::class, 'update']);


        // Product
        Route::get('/products', [AdminProductController::class, 'index']);
        Route::get('/products/create', [AdminProductController::class, 'create']);
        Route::post('/products', [AdminProductController::class, 'store']);
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit']);
        Route::put('/products/{product}', [AdminProductController::class, 'update']);
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy']);
        Route::get('/products/{product}', [AdminProductController::class, 'show']);


        // Category
        Route::get('/categories', [CategoryController::class, 'index']);
        Route::get('/categories/create', [CategoryController::class, 'create']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
        Route::put('/categories/{category}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);


        // Store
        Route::get('/stores', [StoreController::class, 'index']);
        Route::get('/stores/create', [StoreController::class, 'create']);
        Route::post('/stores', [StoreController::class, 'store']);
        Route::get('/stores/{store}/edit', [StoreController::class, 'edit']);
        Route::put('/stores/{store}', [StoreController::class, 'update']);
        Route::delete('/stores/{store}', [StoreController::class, 'destroy']);
        Route::get('/stores/{store}', [StoreController::class, 'show']);


        // Order
        Route::get('/orders', [OrderController::class, 'index']);
        Route::get('/orders/{order}', [OrderController::class, 'show']);


        // Users
        Route::get('/users', [AdminUserController::class, 'index']);
        Route::get('/users/create', [AdminUserController::class, 'create']);
        Route::post('/users', [AdminUserController::class, 'store']);
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit']);
        Route::put('/users/{user}', [AdminUserController::class, 'update']);
        Route::delete('/users/{id}', [AdminUserController::class, 'destroy']);
        Route::get('/users/{user}', [AdminUserController::class, 'show']);

    });
    


    // Order Produk
    Route::get('/product/order', [OrderController::class, 'orderView']);
    Route::post('/product/{product:slug}/order', [OrderController::class, 'orderProduct']);


});


Auth::routes();

