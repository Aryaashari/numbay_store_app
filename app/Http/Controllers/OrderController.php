<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{

    // Dashboard Admin
    public function index() {
        $orders = Order::with('user', 'product')->select('id', 'user_id', 'product_id', 'nama_penerima', 'no_telp_penerima')->get();

        return view('dashboard.order.index', compact('orders'));
    }

    public function show(Order $order) {
        return view('dashboard.order.detail', compact('order'));
    }


    private function sendMessage($no_telp_toko, $request, $produk) {
        $no_wa = '62'.$no_telp_toko;

        $pesan = 'https://api.whatsapp.com/send?phone='. $no_wa .'&text=Hallo, saya ingin memesan produk via Numbay Store.%0A%0ANama produk: '. $produk->nama_produk .'%0AHarga produk: Rp '. number_format($produk->harga_produk, 0, '.', '.') .' %0A%0A==========================%0A%0ANama penerima: '. $request->nama_penerima .'%0ANo telepon penerima: '. $request->no_telp_penerima .'%0AAlamat pengantaran: '. $request->alamat_pengantaran .'%0AKeterangan tambahan: '.($request->keterangan_tambahan ? $request->keterangan_tambahan : "-").'%0AJumlah pesanan: '. $request->jumlah_pesanan .'%0ATotal harga: Rp '. number_format($request->jumlah_pesanan*$produk->harga_produk, 0, '.', '.') .' %0A%0ATerima Kasih.';

        return redirect($pesan);
    }

    public function orderView(Request $request) {
        $product = Product::where('slug', $request->produk)->select(['nama_produk', 'slug', 'harga_produk'])->get()[0];
        $jumlahPesanan = $request->jumlah_pesanan;
        return view('order.form', compact('product', 'jumlahPesanan'));
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
            'keterangan_tambahan' => $request->keterangan_tambahan,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'total_harga' => $request->total_harga
        ]);


        return $this->sendMessage($product->store->no_telp_toko, $request, $product);

    }
}
