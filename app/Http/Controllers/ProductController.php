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

    public function orderView(Product $product) {
        return view('order.form', compact('product'));
    }

    public function orderProduct(Product  $product, Request $request) {
        $request->validate(
            [
                'nama_penerima' => 'required|alpha|min:3',
                'no_telp_penerima' => 'required|numeric|digits_between:10,12',
                'jumlah_pesanan' => 'required|numeric',
                'alamat_pengantaran' => 'required'
            ],
            [
                'nama_penerima.required' => 'Anda belum memasukkan nama penerima!',
                'nama_penerima.alpha' => 'Anda harus memasukkan huruf!',
                'nama_penerima.min' => 'Anda harus memasukkan minimal 3 huruf!',

                'no_telp_penerima.required' => 'Anda belum memasukkan nomor telepon penerima!',
                'no_telp_penerima.numeric' => 'Anda harus memasukkan angka!',
                'no_telp_penerima.digits_between' => 'Anda harus memasukkan 10-12 angka!',

                'jumlah_pesanan.required' => 'Anda belum memasukkan jumlah pesanan!',
                'jumlah_pesanan.numeric' => 'Anda harus memasukkan angka!',

                'alamat_pengantaran.required' => 'Anda belum memasukkan alamat pengantaran!',
                
            ]
        );
    }
}
