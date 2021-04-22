<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'store_id' => 1,
            'category_id' => 1,
            'nama_produk' => 'Coto Makassar',
            'harga_produk' => 30000,
            'deskripsi_produk' => 'Makanan Enak',
            'foto_produk' => 'coto.png'
        ]);

        Product::create([
            'store_id' => 1,
            'category_id' => 1,
            'nama_produk' => 'Siomay Maknyus',
            'harga_produk' => 10000,
            'deskripsi_produk' => 'Makanan Enak',
            'foto_produk' => 'somay.png'
        ]);

        Product::create([
            'store_id' => 1,
            'category_id' => 3,
            'nama_produk' => 'Kangkung Hidroponik',
            'harga_produk' => 10000,
            'deskripsi_produk' => 'Kangkung bagus',
            'foto_produk' => 'kangkung.png'
        ]);

        Product::create([
            'store_id' => 1,
            'category_id' => 1,
            'nama_produk' => 'Papeda Ikan Kuah Kuning',
            'harga_produk' => 15000,
            'deskripsi_produk' => 'Makanan khas Papua',
            'foto_produk' => 'papeda.jpg'
        ]);
    }
}
