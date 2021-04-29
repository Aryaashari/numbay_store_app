<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function show(Store $store) {
        if(request()->is('store/*')) {
            $store = auth()->user()->store;
            $categoryStores = [];
            foreach($store->categories as $category) {
                $categoryStores[] = $category->kategori;
            }

            return view('dashboard.store.profile', compact('store', 'categoryStores'));
        } else {
            $categoryStores = [];
            foreach($store->categories as $category) {
                $categoryStores[] = $category->kategori;
            }

            return view('store.profile', compact('store', 'categoryStores'));
        }
    }


    public function create() {
        $categories = Category::all();
        return view('store.create', compact('categories'));
    }


    public function store(Request $request) {
        $request->validate(
            [
                'nama_toko' => ['required', 'string', 'min:5' , 'max:30'],
                'no_telp_toko' => ['required', 'numeric', 'digits_between:10,12'],
                'alamat_toko' => ['required'],
                'foto_profile_toko' => ['mimes:jpg,jpeg,png']
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



        if ($request->file('foto_profile_toko')) {

            $file = $request->file('foto_profile_toko');
            $fileName = time(). '-'. Str::slug($request->nama_toko) .'-'. auth()->user()->id .'-'.$file->getClientOriginalName();
            $path = storage_path('app/public/uploads/store');
            $file->move($path, $fileName);

        } else {
            $fileName = 'profile_toko.png';
        }


        $store = Store::create([
            'user_id' => auth()->user()->id,
            'nama_toko' => $request->nama_toko,
            'slug' => Str::lower(Str::random(10)).'-'.Str::slug($request->nama_toko),
            'no_telp_toko' => $request->no_telp_toko,
            'akun_instagram' => $request->akun_ig,
            'akun_facebook' => $request->akun_facebook,
            'alamat_toko' => $request->alamat_toko,
            'deskripsi_toko' => $request->deskripsi_toko,
            'foto_profile_toko' => $fileName
        ]);

        $store->categories()->attach($request->categories);
        
        auth()->user()->removeRole('user');
        auth()->user()->assignRole('merchant');

        return redirect('/store/dashboard')->with('statusStore', 'Anda telah berhasil membuat toko!');
        
        
    }
}
