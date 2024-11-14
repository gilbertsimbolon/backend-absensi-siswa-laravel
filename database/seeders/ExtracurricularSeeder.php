<?php

namespace Database\Seeders;

use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtracurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $student = Student::first('id');
    
        Extracurricular::create([
            'students_id' => 1,
            'days' => 'Sabtu',
            'time' => '15.00 WITA',
            'activity' => 'Futsal',
            'teacher_id' => 1,
            'user_id' => 1,
        ]);
        Extracurricular::create([
            'students_id' => 2,
            'days' => 'Sabtu',
            'time' => '15.00 WITA',
            'activity' => 'Karate',
            'teacher_id' => 2,
            'user_id' => 1,
        ]);
        Extracurricular::create([
            'students_id' => 3,
            'days' => 'Sabtu',
            'time' => '15.00 WITA',
            'activity' => 'Futsal',
            'teacher_id' => 1,
            'user_id' => 1,
        ]);
    }
}
