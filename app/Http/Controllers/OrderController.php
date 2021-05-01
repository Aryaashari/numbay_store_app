<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class OrderController extends Controller
{
    public function orderView(Product $product) {
        return view('order.form', compact('product'));
    }

    public function orderProduct(Product  $product, Request $request) {
        $request->validate(
            [
                'nama_penerima' => 'required|regex:/^[\pL\s\-]+$/u|min:3',
                'no_telp_penerima' => 'required|numeric|digits_between:10,12',
                'alamat_pengantaran' => 'required'
            ],
            [
                'nama_penerima.required' => 'Anda belum memasukkan nama penerima!',
                'nama_penerima.regex' => 'Anda harus memasukkan huruf!',
                'nama_penerima.min' => 'Anda harus memasukkan minimal 3 huruf!',

                'no_telp_penerima.required' => 'Anda belum memasukkan nomor telepon penerima!',
                'no_telp_penerima.numeric' => 'Anda harus memasukkan angka!',
                'no_telp_penerima.digits_between' => 'Anda harus memasukkan 10-12 angka!',

                'alamat_pengantaran.required' => 'Anda belum memasukkan alamat pengantaran!',
            ]
        );


        Order::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'nama_penerima' => $request->nama_penerima,
            'no_telp_penerima' => $request->no_telp_penerima,
            'alamat_pengantaran' => $request->alamat_pengantaran,
            'keterangan_tambahan' => $request->keterangan_tambahan
        ]);


        return $this->sendMessage($product->store->no_telp_toko, $request, $product->nama_produk);

    }
}
