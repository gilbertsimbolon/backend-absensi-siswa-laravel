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
        // Comment : Greetings
        $greetingController = new GreetingController();
        $greetings = $greetingController->getGreetings();

        // Comment : Informasi absensi
        $absenceController = new AbsenceController();
        $absence = $absenceController->getAbsence();

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
            'greetings' => $greetings,
            'present' => $absence,
            'announcement' => $announcementsData,
            // 'extracurriculars' => $extracurricularsData,
        ]);
    }
}
