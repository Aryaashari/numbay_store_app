<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class StoreDashboardController extends Controller
{
    public function index() {
        $user = auth()->user();
        $store = $user->store;
        $productLikes = [];

        foreach($store->products as $product) {
            foreach($product->users as $u) {
                if($u->id != $user->id) {
                    $productLikes[] = Product::find($u->pivot->product_id);
                }
            }
        }

        // for($i = 0; $i < count($productLikes); $i++) {
        //     $productLikeSort[] = Product::find(sort($productLikes));
        // }
        // dd($productLikes);
        

        return view('dashboard.store-dashboard', compact('productLikes', 'store'));
    }
}
