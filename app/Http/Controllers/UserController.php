<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editUser() {
        $user = auth()->user();
        return view('user.edit', compact('user'));
    }

    public function updateUser(Request $request) {

        $user = auth()->user();


        if ($request->file('img_user')) {
            if ($user->foto_profile_user != 'user.png') {
                Storage::disk('public')->delete('uploads/user/'.$user->foto_profile_user);
            }
            $file = $request->file('img_user');
            $fileName = time(). '-' .$user->nama_depan.$user->nama_belakang.'.'. $file->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/user');
            $file->move($path, $fileName);
        } else {
            $fileName = $user->foto_profile_user;
        }

        $request->validate(
            [
                'nama_depan' => ['required', 'alpha', 'min:3' , 'max:20'],
                'nama_belakang' => ['required', 'alpha', 'min:3' , 'max:20'],
                'no_telp' => ['required', 'numeric', 'digits_between:10,12'],
                'alamat' => ['required']
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

                'no_telp.required' => 'Anda belum memasukkan no whatsapp!',
                'no_telp.numeric' => 'Anda harus memasukkang angka!',
                'no_telp.digits_between' => 'Anda harus memasukkan 10-12 karakter!',

                'alamat.required' => 'Anda belum memasukkan alamat rumah!',
            ]
        );


        User::where('id', $user->id)->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_telp' => $request->no_telp,
            'alamat_rumah' => $request->alamat,
            'foto_profile_user' => $fileName
        ]);

        return back()->with('status', 'Profile user berhasil diubah!');

    }


    public function editPassword() {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request) {
        // dd($request->request);
    
        $request->validate(
            [
                'old_password' => 'required',
                'password' => 'required|string|min:8|confirmed'
            ],
            [
                'old_password.required' => 'Anda belum memasukkan password saat ini!',

                'password.required' => 'Anda belum memasukkan password baru!',
                'password.min' => 'Anda harus memasukkan minimal 8 karakter!',
                'password.confirmed' => 'Konfirmasi password tidak sesuai!',
            ]
        );


        // Cek apakah password yang dimasukkan sama dengan password yang dimiliki saat ini
        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user = auth()->user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/user/profile/edit')->with('successChangePassword', 'asdasd');
        } else {
            return back()->withErrors(['old_password' => 'Password salah. Silahkan coba lagi atau klik lupa password!']);
        }


    }
}
