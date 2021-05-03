<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends ProductController
{
    public function index() {
        $products = Product::all();

        return view('dashboard.product.index', compact('products'));
    }
}
