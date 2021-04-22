<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home/index');
});

Route::get('/products/1', function() {
    return view('product/detail-product');
});
