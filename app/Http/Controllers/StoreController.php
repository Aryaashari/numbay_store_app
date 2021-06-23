<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function index() {
        $stores = Store::all();
        return view('dashboard.store.index', compact('stores'));
    }


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
        $categories = [];
        $kategoriLainnya;

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
        
        if (request()->is('admin/*')) {
            $users = User::all();
            $userNotHaveStore = [];

            foreach ($users as $u) {
                if ($u->store == null) {
                    $userNotHaveStore[] = $u;
                } 
            }

            return view('dashboard.store.create', compact('categories', 'userNotHaveStore'));
        }

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

                'foto_profile_toko.mimes' => 'Anda harus memasukkan file berekstensi jpg,jpeg, atau png',
                'foto_profile_toko.max' => 'Anda harus memasukkan file maksimal 5 MB'
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
            'user_id' => request()->is('store/create') ? auth()->user()->id : $request->user_id,
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
        

        if (request()->is('store/create')) {

            auth()->user()->removeRole('user');
            auth()->user()->assignRole('merchant');

        } else {
            User::where('id', $request->user_id)->get()[0]->removeRole('user');
            User::where('id', $request->user_id)->get()[0]->assignRole('merchant');
        }

        return request()->is('store/create') ? redirect('/store/dashboard')->with('statusStore', 'Anda telah berhasil membuat toko!') : redirect('/admin/stores')->with('status', 'Toko berhasil ditambahkan!');
        
        
    }


    public function edit() {
        $store = auth()->user()->store;
        $storeCategories = [];

        $categories = [];
        $kategoriLainnya;

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

        if (count($store->categories) > 0) {
            foreach($store->categories as $category) {
                $storeCategories[] = $category->kategori;
            }
        }

        return view('dashboard.store.edit-profile', compact('store', 'categories', 'storeCategories'));
    }


    public function update(Request $request) {
        $user = auth()->user();
        $store = $user->store;

        $request->validate(
            [
                'nama_toko' => ['required', 'string', 'min:5' , 'max:30'],
                'no_telp_toko' => ['required', 'numeric', 'digits_between:10,12'],
                'alamat_toko' => ['required'],
                'foto_profile_toko' => ['mimes:jpg,jpeg,png', 'max:5000']
            ],
            [
                'nama_toko.required' => 'Anda belum memasukkan nama toko!',
                'nama_toko.max' => 'Nama toko tidak boleh lebih 30 huruf!',
                'nama_toko.min' => 'Anda harus memasukkan minimal 5 huruf!',

                'no_telp_toko.required' => 'Anda belum memasukkan no whatsapp!',
                'no_telp_toko.numeric' => 'Anda harus memasukkan angka!',
                'no_telp_toko.digits_between' => 'Anda harus memasukkan 10-12 karakter!',

                'alamat_toko.required' => 'Anda belum memasukkan alamat toko!',

                'foto_profile_toko.mimes' => 'File yang diupload harus berekstensi jpg, jpeg, atau png',
                'foto_profile_toko.max' => 'Ukuran file yang diupload maksimal 5 MB',
            ]
        );


        if ($request->file('foto_profile_toko')) {
            if($store->foto_profile_toko != 'profile_toko.png') {
                Storage::disk('public')->delete('uploads/store/'.$store->foto_profile_toko);
            }
            $file = $request->file('foto_profile_toko');
            $fileName = time(). '-'. Str::slug($request->nama_toko) .'-'. $user->id .'-'.$file->getClientOriginalName();
            $path = storage_path('app/public/uploads/store');
            $file->move($path, $fileName);

        } else {
            $fileName = $store->foto_profile_toko;
        }


        Store::find($store->id)->update([
            'user_id' => $user->id,
            'nama_toko' => $request->nama_toko,
            'slug' => $store->slug,
            'no_telp_toko' => $request->no_telp_toko,
            'akun_instagram' => $request->akun_ig,
            'akun_facebook' => $request->akun_fb,
            'alamat_toko' => $request->alamat_toko,
            'deskripsi_toko' => $request->deskripsi_toko,
            'foto_profile_toko' => $fileName
        ]);
        
        $store->categories()->detach();
        $store->categories()->attach($request->categories);

        return back()->with('status', 'Profile toko berhasil diedit!');
    }

}
