<?php

namespace Database\Seeders;

use App\Models\ParentOfStudent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class ParentOfStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParentOfStudent::create([
            'mother_name' => 'Morika Silitonga',
            'father_name' => 'Matius Simbolon',
            'kk_number' => '023103102930923',
            'phone' => '082168693633',
            'address' => 'Kota Medan',
            'email' => 'silitongasimbolon@parents.com',
            'password' => Hash::make('parent1'),
        ]);
        ParentOfStudent::create([
            'mother_name' => 'Eka Manurung',
            'father_name' => 'Simson Sianturi',
            'kk_number' => '0231031321330923',
            'phone' => '082168646333',
            'address' => 'Doloksanggul',
            'email' => 'manurungsianturi@parents.com',
            'password' => Hash::make('parent2'),
        ]);
    }
}
