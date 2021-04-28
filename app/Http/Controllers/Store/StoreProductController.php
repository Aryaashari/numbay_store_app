<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class StoreProductController extends ProductController
{
    public function index() {
        $user = auth()->user();
        $store = $user->store;
        $products = $store->products;
        
        return view('dashboard.product.index', compact('store', 'products'));
    }
}
