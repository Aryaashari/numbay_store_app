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
        

        return view('dashboard.store-dashboard', compact('store'));
    }
}
