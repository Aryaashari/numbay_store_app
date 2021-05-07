<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit() {
        $user = auth()->user();

        return view('dashboard.admin.edit-profile', compact('user'));
    }


    public function update(Request $request) {

        $user = auth()->user();

        $request->validate(
            [
                'nama_depan' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20',
                'nama_belakang' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:20',
                'no_telp' => 'required|numeric|digits_between:10,12',
                'alamat_rumah' => 'required',
                'foto_profile' => 'mimes:jpg,png,jpeg|file|max:5000'
            ],
            [
                'nama_depan.required' => 'Anda belum memasukkan nama depan!',
                'nama_depan.regex' => 'Anda harus memasukkan huruf!',
                'nama_depan.min' => 'Anda harus memasukkan minimal 3 huruf!',
                'nama_depan.max' => 'Anda harus memasukkan maksimal 20 huruf!',

                'nama_belakang.required' => 'Anda belum memasukkan nama belakang!',
                'nama_belakang.regex' => 'Anda harus memasukkan huruf!',
                'nama_belakang.min' => 'Anda harus memasukkan minimal 3 huruf!',
                'nama_belakang.max' => 'Anda harus memasukkan maksimal 20 huruf!',

                'no_telp.required' => 'Anda belum memasukkan no telepon!',
                'no_telp.numeric' => 'Anda harus memasukkan angka!',
                'no_telp.digits_between' => 'Anda harus memasukkan 10-12 angka!',
                
                'alamat_rumah.required' => 'Anda belum memasukkan alamat!',

                'foto_profile.mimes' => 'Anda harus memasukkan file berekstensi jpg,jpeg, atau png',
                'foto_profile.max' => 'Anda harus memasukkan file maksimal 5 MB'
            ]
        );


        if ($request->file('foto_profile')) {
            
            if ($user->foto_profile_user != 'user.png') {
                Storage::disk('public')->delete('uploads/user/'.$user->foto_profile_user);
            }

            $file = $request->file('foto_profile');
            $fileName = time(). '-' .$request->nama_depan.$request->nama_belakang. '-'. $user->id .'.'. $file->getClientOriginalExtension();
            $path = storage_path('app/public/uploads/user');
            $file->move($path, $fileName);

        } else {
            $fileName = $user->foto_profile_user;
        }

        User::find($user->id)->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_telp' => $request->no_telp,
            'alamat_rumah' => $request->alamat_rumah,
            'foto_profile_user' => $fileName
        ]);

        return back()->with('status', 'Profile berhasil diedit!');

    }
}
