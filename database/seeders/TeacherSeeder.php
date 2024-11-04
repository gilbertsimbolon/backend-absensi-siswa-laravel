<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            'nip' => '1',
            'name' => 'Maria Marcelona Simbolon',
            'concent' => 'Matematika',
            'phone' => '081234567980',
            'email' => 'mariamarcelona@gmail.com',
            'gender' => 'Wanita',
            'place_born' => 'Kota Medan',
            'date_born' => '2 Juli 2000',
            'address' => 'Medan Amplas',
            'foto' => 'None',
            'qr_code' => 'None',
        ]);
    }
}
