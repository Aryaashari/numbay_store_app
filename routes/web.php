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
// Wishlist
Route::get('/wishlists', [WishlistController::class, 'show']);


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


// Login
Route::get('/login', function() {
    return view('login');
});


// Register
Route::get('/register', function() {
    return view('register');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
