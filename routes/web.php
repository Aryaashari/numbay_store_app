<?php

use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('home.index');
});


// Detail Produk
Route::get('/products/1', function() {
    return view('product.detail-product');
});


// Profile Toko
Route::get('/store/slug-store1', function() {
    return view('store.profile');
});


// Wishlist
Route::get('/wishlists', function() {
    return view('wishlist.index');
});