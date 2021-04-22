<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'kategori' => 'Kuliner'
        ]);

        Category::create([
            'kategori' => 'Aksesoris'
        ]);

        Category::create([
            'kategori' => 'Perkebunan'
        ]);

        Category::create([
            'kategori' => 'Lainnya'
        ]);
    }
}
