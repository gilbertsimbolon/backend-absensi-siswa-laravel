<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParentOfStudent;
use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // mengambil data orang tua yang sedang login
        $parent = auth()->guard('api_parent_of_students')->user();

        $students = $parent->students;

        // Comment : Greetings
        $currentHour = Carbon::now()->format('H');
        $greeting = '';

        if ($currentHour >= 5 && $currentHour < 12) {
            $greeting = 'Selamat Pagi, Orang Tua';
        } elseif ($currentHour >= 12 && $currentHour < 18) {
            $greeting = 'Selamat Siang, Orang Tua';
        } else {
            $greeting = 'Selamat Malam, Orang Tua';
        }

        $studentName = $students->pluck('name')->implode(' dan ');

        $fullGreeting = "{$greeting} {$studentName}!";

        // Comment : Informasi absensi

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

        // Comment : Informasi Announcement
        $announcementController = new AnnouncementController();
        $announcementsData = $announcementController->getAnnouncements();

        // Comment : Informasi Extracurricular
        // $extracurricularsData = [];

        // // Loop melalui setiap siswa dan ambil ekstrakurikuler yang dipilih
        // foreach ($students as $student) {
        //     // Ambil ekstrakurikuler yang dipilih oleh siswa
        //     $extracurriculars = $student->extracurriculars;

        //     // Loop melalui ekstrakurikuler dan buat array untuk dikembalikan
        //     foreach ($extracurriculars as $extracurricular) {
        //         $extracurricularsData[] = [
        //             'activity' => $extracurricular->activity,
        //             'days' => $extracurricular->days,
        //             'time' => $extracurricular->time,
        //             'teacher_id' => $extracurricular->teacher_id,
        //         ];
        //     }
        // }

        // // Jika Anda ingin memetakan data ke dalam format tertentu
        // $extracurricularsData = collect($extracurricularsData)->map(function ($item) {
        //     return [
        //         'activity' => $item['activity'],
        //         'days' => $item['days'],
        //         'time' => $item['time'],
        //         'teacher_id' => $item['teacher_id'],
        //     ];
        // });

        // mengembalikan nilai json
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil.',
            // 'user' => $parent,
            'greetings' => $fullGreeting,
            'present' => $student_absences,
            'announcement' => $announcementsData,
            // 'extracurriculars' => $extracurricularsData,
        ]);
    }
}
