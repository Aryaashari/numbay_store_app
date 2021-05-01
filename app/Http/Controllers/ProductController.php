<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show(Product $product) {

        $isLike = false;

        if(auth()->user()) {
            $userProducts = auth()->user()->products;
            foreach($userProducts as $p) {
                if($product->id == $p->id) {
                    $isLike = true;
                }
            }
        }

        if (request()->is('store/*')) {
            return view('dashboard.product.detail', compact('product'));
        }
        
        
        return view('product.detail-product', compact('product', 'isLike'));
    }


    public function create() {
        $categories = Category::all();
        return view('dashboard.product.create', compact('categories'));
    }



    public function store(Request $request) {

        $request->validate(
            [
                'nama_produk' => 'required|string',
                'harga_produk' => 'required|numeric',
                'foto_produk' => 'required|mimes:jpg,jpeg,png|file|max:5000'
            ],
            [
                'nama_produk.required' => 'Anda belum memasukkan nama produk!',

                'harga_produk.required' => 'Anda belum memasukkan harga produk!',
                'harga_produk.numeric' => 'Anda harus memasukkan angka!',

                'foto_produk.required' => 'Anda belum memasukkan foto produk!',
                'foto_produk.mimes' => 'Anda harus mengupload file berekstensi jpg, jpeg, atau png!',
                'foto_produk.max' => 'Ukuran file yang anda upload terlalu besar, maksimal 5 MB!',
            ]
        );

        $user = auth()->user();
        $store = $user->store;

        $slug = Str::lower(Str::random(5)).'-'.Str::slug($request->nama_produk);


        $file = $request->file('foto_produk');
        $fileName = time() .'-'. Str::slug($request->nama_produk) .'-userId='. $user->id .'.'. $file->getClientOriginalExtension();
        $path = storage_path('app/public/uploads/product');
        $file->move($path, $fileName);


        $product = Product::create([
            'store_id' => $store->id,
            'category_id' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'slug' => $slug,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'foto_produk' => $fileName,
            'tampilkan_produk' => 'ya'
        ]);


        if ($request->tags) {
            foreach($request->tags as $tag) {
                Tag::create([
                    'product_id' => $product->id,
                    'tag' => $tag
                ]);
            }
        }


        if($request->is('store/*')) {
            return redirect('/store/products')->with('status', 'Produk berhasil ditambahkan!');
        }

    }


    public function edit(Product $product) {
        $categories = Category::all();
        return view('dashboard.product.edit', compact('product', 'categories'));
    }

    public function update(Product $product, Request $request) {
        $user = auth()->user();
        $store = $user->store;


        $request->validate(
            [
                'nama_produk' => 'required|string',
                'harga_produk' => 'required|numeric',
                'foto_produk' => 'mimes:jpg,jpeg,png|file|max:5000'
            ],
            [
                'nama_produk.required' => 'Anda belum memasukkan nama produk!',

                'harga_produk.required' => 'Anda belum memasukkan harga produk!',
                'harga_produk.numeric' => 'Anda harus memasukkan angka!',

                'foto_produk.mimes' => 'Anda harus mengupload file berekstensi jpg, jpeg, atau png!',
                'foto_produk.max' => 'Ukuran file yang anda upload terlalu besar, maksimal 5 MB!',
            ]
        );


        if ($request->file('foto_produk')) {
            Storage::disk('public')->delete('uploads/product/'.$product->foto_produk);
            $file = $request->file('foto_produk');
            $fileName = time() .'-'. Str::slug($request->nama_produk) .'-userId='. $user->id .'.'. $file->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/product');
            $file->move($path, $fileName);
        } else {
            $fileName = $product->foto_produk;
        }


        Product::find($product->id)->update([
            'store_id' => $store->id,
            'category_id' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'slug' => $product->slug,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'foto_produk' => $fileName,
            'tampilkan_produk' => ($request->tampilkan_produk) ? 'ya' : 'tidak'
        ]);

        
        // Hapus semua tag yang dimiliki produk
        for($i = 0; $i < count($product->tags); $i++) {
            Tag::where('product_id', $product->id)->delete();
        }


        // Tambahkan semua tag yang dimiliki produk
        if ($request->tags) {
            foreach($request->tags as $tag) {
                Tag::create([
                    'product_id' => $product->id,
                    'tag' => $tag
                ]);
            }
        }

        
        if (request()->is('store/*')) {
            return redirect('store/products')->with('status', 'Produk berhasil diedit!');
        }

    }


    public function destroy(Product $product) {
        Product::destroy($product->id);
        Storage::disk('public')->delete('uploads/product/'.$product->foto_produk);

        if(request()->is('store/*')) {
            return redirect('store/products')->with('status', 'Produk berhasil dihapus!');
        }
    }


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

    private function sendMessage($no_telp_toko, $request, $namaProduk) {
        $no_wa = '62'.$no_telp_toko;

        $pesan = 'https://api.whatsapp.com/send?phone='. $no_wa .'&text=Permisi, saya ingin memesan '. $namaProduk .':%0ANama penerima: '. $request->nama_penerima .'%0ANo telepon penerima: '. $request->no_telp_penerima .'%0AAlamat pengantaran: '. $request->alamat_pengantaran .'%0AKeterangan tambahan: '.$request->keterangan_tambahan.'%0A%0ATerima Kasih';

        return redirect($pesan);
    }
}
