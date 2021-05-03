<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('dashboard.product.index', compact('products'));
    }
}
