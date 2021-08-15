<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;
use App\Models\Order;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show(Product $product) {

        if (request()->is('store/*')) {
            $this->authorize('show', $product);
        }

        $isLike = false;

        if(auth()->user()) {
            $userProducts = auth()->user()->products;
            foreach($userProducts as $p) {
                if($product->id == $p->id) {
                    $isLike = true;
                }
            }
        }

        if (request()->is('store/*') || request()->is('admin/*')) {
            return view('dashboard.product.detail', compact('product'));
        }
        
        
        return view('product.detail-product', compact('product', 'isLike'));
    }


    public function create() {

        // Jika berada di halaman admin, maka tampilkan data store
        if (request()->is('admin/*')) {
            $stores = Store::all();
        }
        
        $categories = [];
        $kategoriLainnya;

        // Looping semua kategori
        foreach (Category::select('kategori')->get() as $category) {

            // Jika kategori merupakan kategori Lainnya, maka masukkan ke variable kategoriLainnya
            if ($category->kategori == 'Lainnya') {
                $kategoriLainnya = $category;

            // Jika bukan masukkan ke dalam array categories 
            } else {
                $categories[] = $category;
            }
        }

        // Masukkan kategoriLainnya kedalam array categories, supaya kategoriLainnya berada selalu paling terakhir
        $categories[] = $kategoriLainnya;

        // Jika berada di halaman admin
        if (request()->is('admin/*')) {
            return view('dashboard.product.create', compact('categories', 'stores'));
        } else {
            return view('dashboard.product.create', compact('categories'));
        }
    }



    public function store(Request $request) {
        if (request()->is('admin/*')) {
            $request->validate(
                [
                    'store_id' => 'required',
                    'nama_produk' => 'required|string',
                    'harga_produk' => 'required|numeric|not_regex:[\.]',
                    'foto_produk' => 'required|mimes:jpg,jpeg,png|file|max:5000'
                ],
                [
                    'store_id.required' => 'Anda belum memasukkan toko!',
    
                    'nama_produk.required' => 'Anda belum memasukkan nama produk!',
    
                    'harga_produk.required' => 'Anda belum memasukkan harga produk!',
                    'harga_produk.numeric' => 'Anda harus memasukkan angka!',
                    'harga_produk.not_regex' => 'Anda tidak boleh menambahkan titik!',
    
                    'foto_produk.required' => 'Anda belum memasukkan foto produk!',
                    'foto_produk.mimes' => 'Anda harus mengupload file berekstensi jpg, jpeg, atau png!',
                    'foto_produk.max' => 'Ukuran file yang anda upload terlalu besar, maksimal 5 MB!',
                ]
            );
        } else {
            $request->validate(
                [
                    'nama_produk' => 'required|string',
                    'harga_produk' => 'required|numeric|not_regex:[\.]',
                    'foto_produk' => 'required|mimes:jpg,jpeg,png|file|max:5000'
                ],
                [
                    'nama_produk.required' => 'Anda belum memasukkan nama produk!',
    
                    'harga_produk.required' => 'Anda belum memasukkan harga produk!',
                    'harga_produk.numeric' => 'Anda harus memasukkan angka!',
                    'harga_produk.not_regex' => 'Anda tidak boleh menambahkan titik!',
    
                    'foto_produk.required' => 'Anda belum memasukkan foto produk!',
                    'foto_produk.mimes' => 'Anda harus mengupload file berekstensi jpg, jpeg, atau png!',
                    'foto_produk.max' => 'Ukuran file yang anda upload terlalu besar, maksimal 5 MB!',
                ]
            );
        }


        $user = auth()->user();
        $store = $user->store;

        $slug = Str::lower(Str::random(5)).'-'.Str::slug($request->nama_produk);


        $file = $request->file('foto_produk');
        $fileName = time() .'-'. Str::slug($request->nama_produk) .'-userId='. $user->id .'.'. $file->getClientOriginalExtension();
        $path = storage_path('app/public/uploads/product');
        $file->move($path, $fileName);


        $product = Product::create([
            'store_id' => (request()->is('store/*') ? $store->id : $request->store_id ),
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
        } else {
            return redirect('/admin/products')->with('status', 'Produk berhasil ditambahkan!');
        }

    }


    public function edit(Product $product) {

        $this->authorize('edit', $product);

        $categories = [];
        $kategoriLainnya;
        $stores = Store::all();

        // Looping semua kategori
        foreach (Category::all() as $category) {

            // Jika kategori merupakan kategori Lainnya, maka masukkan ke variable kategoriLainnya
            if ($category->kategori == 'Lainnya') {
                $kategoriLainnya = $category;

            // Jika bukan masukkan ke dalam array categories 
            } else {
                $categories[] = $category;
            }
        }

        // Masukkan kategoriLainnya kedalam array categories, supaya kategoriLainnya berada selalu paling terakhir
        $categories[] = $kategoriLainnya;
        
        return view('dashboard.product.edit', compact('product', 'categories', 'stores'));
    }

    public function update(Product $product, Request $request) {

        $this->authorize('edit', $product);

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
            'store_id' => (request()->is('store/*') ? $store->id : $request->store_id),
            'category_id' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'slug' => $product->slug,
            'harga_produk' => $request->harga_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'foto_produk' => $fileName,
            'tampilkan_produk' => 'ya'
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
        } else {
            return redirect('admin/products')->with('status', 'Produk berhasil diedit!');
        }

    }


    public function destroy(Product $product) {

        $this->authorize('destroy', $product);

        Product::destroy($product->id);
        Storage::disk('public')->delete('uploads/product/'.$product->foto_produk);

        if(request()->is('store/*')) {
            return redirect('store/products')->with('status', 'Produk berhasil dihapus!');
        } else {
            return redirect('admin/products')->with('status', 'Produk berhasil dihapus!');
        }
    }
}
