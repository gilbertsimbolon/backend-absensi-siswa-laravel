<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'gilbert',
            'email' => 'gilber@gilbert.com',
            'password' => Hash::make('gilbert123'),
        ]);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
