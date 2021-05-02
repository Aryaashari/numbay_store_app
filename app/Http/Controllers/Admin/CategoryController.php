<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('dashboard.category.index', compact('categories'));
    }

    public function create() {
        return view('dashboard.category.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'kategori' => 'required|regex:/^[\pL\s\-]+$/u'
            ],
            [
                'kategori.required' => 'Anda belum memasukkan kategori!',
                'kategori.regex' => 'Anda harus memasukkan huruf!'
            ]
        );

        
        Category::create([
            'kategori' => $request->kategori
        ]);

        return redirect('/admin/categories')->with('status', 'Kategori berhasil ditambahkan!');
    }


    public function destroy($id) {
        Category::destroy($id);
        
        return redirect('/admin/categories')->with('status', 'Kategori berhasil dihapus!');
    }
}
