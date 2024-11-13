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
            'nisn',
            'name',
            'parent_id',
            'phone',
            'class_of_students_id',
            'email',
            'gender',
            'place_born',
            'date_born',
            'address',
            'foto',
        ]);
    }
}
