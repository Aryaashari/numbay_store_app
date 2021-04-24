<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WishlistController extends Controller
{
    public function show() {
        $products = auth()->user()->products;
        return view('wishlist.index', compact('products'));
    }

    public function addWishlist(Product $product) {
        auth()->user()->products()->attach($product->id);
        return back()->with('status', 'Produk telah ditambahkan kedalam wishlist');
    }

    public function removeWishlist(Product $product) {
        auth()->user()->products()->detach($product->id);
        return back()->with('status', 'Produk telah dihapus dari wishlist');
    }
}
