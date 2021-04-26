<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'merchant'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        
        User::find(1)->assignRole(['admin', 'merchant']);
        User::find(2)->assignRole('merchant');
        User::find(3)->assignRole('user');
    }
}
