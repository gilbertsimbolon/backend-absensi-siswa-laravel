<?php

namespace Database\Seeders;

use App\Models\Student;
use Faker\Factory as Faker;
use App\Models\ParentOfStudent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nisn' => '001',
            'name' => 'Gilbert Simbolon',
            'parent_id' => 1,
            'phone' => '081367937852',
            'class_of_student_id' => 1, 
            'email' => 'gilbert@students.com',
            'gender' => 'Pria',
            'place_born' => 'Kota Medan',
            'date_born' => '1 Juli 2005',
            'address' => 'Jl.Sisingamangaraja',
            'foto' => 'none',
        ]);
        Student::create([
            'nisn' => '002',
            'name' => 'Maria Simbolon',
            'parent_id' => 1,
            'phone' => '081367937852',
            'class_of_student_id' => 2,
            'email' => 'maria@students.com',
            'gender' => 'Wanita',
            'place_born' => 'Kota Medan',
            'date_born' => '1 Juli 2006',
            'address' => 'Jl.Sisingamangaraja',
            'foto' => 'none',
        ]);
        Student::create([
            'nisn' => '003',
            'name' => 'Setyo Sianturi',
            'parent_id' => 2,
            'phone' => '081367937852',
            'class_of_student_id' => 3,
            'email' => 'setyo@students.com',
            'gender' => 'Pria',
            'place_born' => 'Doloksanggul',
            'date_born' => '1 Juli 2006',
            'address' => 'Lintong ni Huta',
            'foto' => 'none',
        ]);
    }
}
