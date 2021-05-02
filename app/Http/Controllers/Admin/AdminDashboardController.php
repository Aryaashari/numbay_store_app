<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Store, Product};

class AdminDashboardController extends Controller
{
    public function index() {
        $users = User::all();
        $stores = Store::all();
        $products = Product::all();
        return view('dashboard.admin-dashboard', compact('users', 'stores', 'products'));
    }
}
