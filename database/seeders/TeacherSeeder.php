<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeacherSeeder extends Seeder
{
    public function run(): void;
    {
        $teachers = [
        [
        'nip' => '12345',
        'name' => 'Maria Marcelona Simbolon',
        'class' => 'Matematika',
        'phone' => '081234567890',
        'email' => 'mariamarcelona@gmail.com',
        'gender' => 'Perempuan',
        'place_born' => 'Medan',
        'date_born' => '1 July 2000',
        'address' => 'Kota Medan',
        'foto',
        'qr_code',
        ],
    ];
    DB:table('teachers')->insert($teachers);
    }
}
