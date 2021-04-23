<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show(Product $products) {

        $isLike = false;

        if(auth()->user()) {
            $userProducts = auth()->user()->products;
            foreach($userProducts as $product) {
                if($products->id == $product->id) {
                    $isLike = true;
                }
            }
        }
        return view('product.detail-product', compact('products', 'isLike'));
    }
}
