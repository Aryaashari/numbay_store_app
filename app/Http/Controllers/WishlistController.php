<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show() {
        $products = auth()->user()->products;
        return view('wishlist.index', compact('products'));
    }
}
