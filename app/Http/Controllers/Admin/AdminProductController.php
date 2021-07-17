<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends ProductController
{
    public function index() {
        $products = Product::with('category', 'tags', 'store')->get();

        return view('dashboard.product.index', compact('products'));
    }
}
