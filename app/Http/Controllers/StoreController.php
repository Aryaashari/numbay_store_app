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

    public function create() {
        return view('store.create');
    }

    public function store(Request $request) {
        $request->validate(
            [
                'nama_toko' => ['required', 'string', 'min:5' , 'max:30'],
                'no_telp_toko' => ['required', 'numeric', 'digits_between:10,12'],
                'alamat_toko' => ['required']
            ],
            [
                'nama_toko.required' => 'Anda belum memasukkan nama toko!',
                'nama_toko.max' => 'Nama toko tidak boleh lebih 30 huruf!',
                'nama_toko.min' => 'Anda harus memasukkan minimal 5 huruf!',

                'no_telp_toko.required' => 'Anda belum memasukkan no whatsapp!',
                'no_telp_toko.numeric' => 'Anda harus memasukkang angka!',
                'no_telp_toko.digits_between' => 'Anda harus memasukkan 10-12 karakter!',

                'alamat_toko.required' => 'Anda belum memasukkan alamat toko!',
            ]
        );
    }
}
