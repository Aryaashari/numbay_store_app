<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class, 
            StoreSeeder::class, 
            CategorySeeder::class, 
            ProductSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
        ]);
    }
}
