<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

// Home
Route::get('/', [HomeController::class, 'index']);


// Detail Produk
Route::get('/detail/product/{products:slug}', [ProductController::class, 'show']);


// Profile Toko
Route::get('/profile/store/slug-store1', function() {
    return view('store.profile');
});


// Wishlist
Route::get('/wishlists', function() {
    return view('wishlist.index');
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


// Login
Route::get('/login', function() {
    return view('login');
});


// Register
Route::get('/register', function() {
    return view('register');
});