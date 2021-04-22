<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(Request $request) {
        if ($request->search) {

            $products = Product::whereHas('store', function(Builder $query) use($request) {
                $query->where('nama_toko', 'LIKE', '%'.$request->search.'%');
            })->orWhere('nama_produk', 'LIKE', '%'.$request->search.'%')->orWhereHas('tags', function(Builder $query) use($request){
                $query->where('tag', 'LIKE', '%'.$request->search.'%');
            })->simplepaginate(8);
            
            $products->appends(['search' => $request->search]);

        } else {
            $products = Product::inRandomOrder()->paginate(1);
        }
        return view('home.index', compact('products'));
    }
}
