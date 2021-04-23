<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{
    public function show(Store $stores) {
        $categoryStores = [];
        foreach($stores->categories as $stores->category) {
            $categoryStores[] = $stores->category->kategori;
        }

        return view('store.profile', compact('stores', 'categoryStores'));
    }
}
