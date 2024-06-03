<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'administrator',
        ]);

        Role::create([
            'role_name' => 'operator',
        ]);

        Role::create([
            'role_name' => 'kepalagudang',
        ]);
        
        User::factory(5)->create();

    
    }
}
