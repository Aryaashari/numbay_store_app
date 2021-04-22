<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {
        $products = Product::inRandomOrder()->simplePaginate(8);
        return view('home.index', compact('products'));
    }
}
