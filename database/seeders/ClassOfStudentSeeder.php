<?php

namespace Database\Seeders;

use App\Models\ClassOfStudent;
use App\Models\Teacher;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassOfStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassOfStudent::create([
            'name' => '10-1',
            'teacher_id' => 1,
        ]);
        ClassOfStudent::create([
            'name' => '10-2',
            'teacher_id' => 2,
        ]);
        ClassOfStudent::create([
            'name' => '10-3',
            'teacher_id' => 3,
        ]);
    }
}
