<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
        // dd($request->request);
    
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
    }

    public function destroy($id) {
        User::destroy($id);

        return redirect('/admin/users')->with('status', 'Pengguna berhasil dihapus!');
    }
}
