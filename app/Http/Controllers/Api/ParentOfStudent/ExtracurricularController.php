<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use App\Models\Student;
use Illuminate\Http\Request;

class ExtracurricularController extends Controller
{
    public function getExtracurricular()
    {
        // Mendapatkan pengguna yang sedang login sebagai orang tua
        $parent = auth()->guard('api_parent_of_students')->user();

        // Mendapatkan siswa-siswa yang terhubung dengan orang tua yang sedang login
        $students = $parent->students;

        // Inisialisasi array untuk menyimpan data ekstrakurikuler
        $extracurricularsData = [];

        // Looping melalui setiap siswa yang terhubung dengan orang tua
        foreach ($students as $student) {
            // Ambil ekstrakurikuler yang terhubung dengan siswa menggunakan students_id
            $extracurriculars = Extracurricular::where('students_id', $student->id)->get();

            // Menyusun data ekstrakurikuler siswa
            foreach ($extracurriculars as $extracurricular) {
                $extracurricularsData[] = [
                    'students_id' => $extracurricular->students_id,
                    'activity' => $extracurricular->activity,
                    'days' => $extracurricular->days,
                    'time' => $extracurricular->time,
                    'teachers_id' => $extracurricular->teacher_id, // Jika `teacher_id` terhubung langsung
                ];
            }
        }

        // Jika ada data ekstrakurikuler, tampilkan dalam response
        if (!empty($extracurricularsData)) {
            return response()->json([
                'message' => 'Ekstrakurikuler yang diambil',
                'data' => $extracurricularsData
            ]);
        } else {
            return response()->json([
                'message' => 'Tidak ada Ekstrakurikuler yang diambil',
            ]);
        }

        return $extracurricularsData;
    }
}
