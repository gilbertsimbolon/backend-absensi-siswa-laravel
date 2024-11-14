<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AbsenceController extends Controller
{
    public function getAbsence()
    {
        $parent = auth()->guard('api_parent_of_students')->user();

        $students = $parent->students;

        Carbon::setLocale('id');

        $today = Carbon::now();

        $hari = $today->isoFormat('dddd');

        $student_absences = [];

        // loop untuk mengambil data absensi setiap siswa dari orang tua
        foreach ($students as $student) {
            $absences = $student->student_absences;

            // menyusun data absensi
            foreach ($absences as $absence) {
                $student_absences[] = "Status kehadiran {$student->name} pada hari {$hari} adalah {$absence->present}";
            }
        }

        return $student_absences;
    }
}
