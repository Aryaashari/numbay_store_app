<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index() {
        $users = User::with('roles')->get();
        
        return view('dashboard.user.index', compact('users'));
    }

    public function show(User $user) {
        return view('dashboard.user.profile', compact('user'));
    }

    public function create() {
        return view('dashboard.user.create');
    }

    public function store(Request $request) {
    
        $request->validate(
            [
                'nama_depan' => ['required', 'alpha', 'min:3' , 'max:20'],
                'nama_belakang' => ['required', 'alpha', 'min:3' , 'max:20'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'no_telp' => ['required', 'numeric', 'digits_between:10,12'],
                'alamat_rumah' => ['required'],
                'foto_profile_user' => ['mimes:jpg,jpeg,png', 'max:5024']
            ],
            [
                'nama_depan.required' => 'Anda belum memasukkan nama depan!',
                'nama_depan.alpha' => 'Anda harus memasukkan huruf!',
                'nama_depan.max' => 'Nama depan tidak boleh lebih 20 huruf!',
                'nama_depan.min' => 'Anda harus memasukkan minimal 3 huruf!',

                'nama_belakang.required' => 'Anda belum memasukkan nama belakang!',
                'nama_belakang.alpha' => 'Anda harus memasukkan huruf!',
                'nama_belakang.max' => 'Nama belakang tidak boleh lebih 20 huruf!',
                'nama_belakang.min' => 'Anda harus memasukkan minimal 3 huruf!',

                'email.required' => 'Anda belum memasukkan email!',
                'email.email' => 'Anda memasukkan email yang tidak valid!',
                'email.unique' => 'Email yang anda masukkan telah terdaftar!',

                'password.required' => 'Anda belum memasukkan password',
                'password.min' => 'Anda harus memasukkan minimal 8 karakter!',
                'password.confirmed' => 'Konfirmasi password tidak sesuai!',

                'no_telp.required' => 'Anda belum memasukkan no whatsapp!',
                'no_telp.numeric' => 'Anda harus memasukkang angka!',
                'no_telp.digits_between' => 'Anda harus memasukkan 10-12 karakter!',

                'alamat_rumah.required' => 'Anda belum memasukkan alamat rumah!',

                'foto_profile_user.mimes' => 'Anda harus memasukkan file berekstensi jpg,jpeg, atau png',
            ]
        );


        
        // Upload File Profile
        if($request->file('foto_profile_user')) {
            $file = $request->file('foto_profile_user');
            $fileName = time(). '-' .$request->nama_depan.$request->nama_belakang.'.'. $file->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/user');
            $file->move($path, $fileName);
        } else {
            $fileName = 'user.png';
        }
        


        // Masukkan data ke database
        $user = User::create([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telp' => $request->no_telp,
            'alamat_rumah' => $request->alamat_rumah,
            'foto_profile_user' => $fileName
        ]);


        // Tambahkan Role Pada User
        $user->assignRole('user');

        // Jika isAdmin on, maka tambahkan role admin pada user
        if($request->isAdmin) {
            $user->assignRole('admin');
        }


        return redirect('/admin/users')->with('status', 'Pengguna berhasil ditambahkan!');
    }


    public function edit(User $user) {
        return view('dashboard.user.edit', compact('user'));
    }


    public function destroy($id) {
        User::destroy($id);

        return redirect('/admin/users')->with('status', 'Pengguna berhasil dihapus!');
    }
}
