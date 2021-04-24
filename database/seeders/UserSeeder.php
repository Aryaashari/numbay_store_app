<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama_depan' => 'Arya',
            'nama_belakang' => 'Ashari',
            'email' => 'arya@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '081215750405',
            'alamat_rumah' => 'Doyo baru',
            'foto_profile_user' => 'user.png'
        ]);

        User::create([
            'nama_depan' => 'Vicky',
            'nama_belakang' => 'Irmanto',
            'email' => 'vicky@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '08123456789',
            'alamat_rumah' => 'Doyo baru',
            'foto_profile_user' => 'user.png'
        ]);

        User::create([
            'nama_depan' => 'Safira',
            'nama_belakang' => 'Rahmadani',
            'email' => 'fira@gmail.com',
            'password' => Hash::make('password'),
            'no_telp' => '08123456780',
            'alamat_rumah' => 'Doyo baru',
            'foto_profile_user' => 'user.png'
        ]);
    }
}
