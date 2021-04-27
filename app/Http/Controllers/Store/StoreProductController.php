<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;

class StoreProductController extends ProductController
{
    public function index() {
        $user = auth()->user();
        $store = $user->store;
        return view('dashboard.product.index', compact('store'));
    }
}
