<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $student = Student::first();  // Ambil siswa pertama

        Announcement::create([
            'user_id' => 1,
            'title' => 'Pergantian Ketua Organisasi OSIS',
            'content' => 'Samsul Sinaga yang menjabat sebagai Ketua OSIS periode 2022-2023, telah digantikan oleh Jeremi Tamba periode 2023-2024',
            'student_id' => $student->id,  // Menambahkan student_id
            'status' => false,
        ]);
    }

}
