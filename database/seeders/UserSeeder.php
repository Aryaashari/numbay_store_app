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
            'nama_depan' => 'Numbay',
            'nama_belakang' => 'Store',
            'email' => 'numbaystore@gmail.com',
            'password' => Hash::make('UMKMJAYAPURA2021'),
            'no_telp' => '081215750405',
            'alamat_rumah' => 'Doyo baru',
            'foto_profile_user' => 'user.png'
        ]);
    }
}
