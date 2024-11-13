<?php

namespace Database\Seeders;

use App\Models\StudentAbsence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentAbsenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAbsence::create([
            'present' => 'Hadir',
            'student_id' => 1,
            'user_id' => 1,
        ]);
        StudentAbsence::create([
            'present' => 'Sakit',
            'student_id' => 2,
            'user_id' => 1,
        ]);
    }
}
