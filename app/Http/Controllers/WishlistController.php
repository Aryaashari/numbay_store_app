<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function show() {
        dd(auth()->user()->products);
        $products = auth()->products;
        return view('wishlist.index');
    }
}
