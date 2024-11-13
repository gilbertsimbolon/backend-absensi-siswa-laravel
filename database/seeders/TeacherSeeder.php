<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\QueryException;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'nip' => '00001',
            'name' => 'Gultom',
            'concent' => 'Matematika',
            'phone' => '081236479211',
            'email' => 'gultom@teachers.com',
            'gender' => 'Pria',
            'place_born' => 'Dolok Sanggul',
            'date_born' => '17 Mei 1989',
            'address' => 'Gg. Melati',
            'foto' => 'none', 
        ]);
        Teacher::create([
            'nip' => '00002',
            'name' => 'Siagian',
            'concent' => 'Biologi',
            'phone' => '081236479212',
            'email' => 'siagian@teachers.com',
            'gender' => 'Pria',
            'place_born' => 'Saribudolok',
            'date_born' => '17 Mei 1990',
            'address' => 'Gg. Mawar',
            'foto' => 'none',
        ]);
        Teacher::create([
            'nip' => '00003',
            'name' => 'Marpaung',
            'concent' => 'Kimia',
            'phone' => '081236479217',
            'email' => 'marpaung@teachers.com',
            'gender' => 'Pria',
            'place_born' => 'Siantar',
            'date_born' => '17 Mei 1991',
            'address' => 'Gg. Eceng Gondok',
            'foto' => 'none',
        ]);
    }
}
