<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Store::create([
            'user_id' => 1,
            'nama_toko' => 'Toko Arya',
            'slug' => 'toko-arya1',
            'no_telp_toko' => '08123456788',
            'akun_instagram' => 'aryyashari',
            'alamat_toko' => 'Jl.pasar lama sentani',
            'deskripsi_toko' => 'Toko ini menjual peralatan-peralatan yang anda butuhkan sehari-hari',
            'foto_profile_toko' => 'profile_toko.png'
        ]);
    }
}
