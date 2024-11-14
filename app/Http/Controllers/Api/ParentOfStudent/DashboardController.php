<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParentOfStudent;
use App\Http\Controllers\Controller;
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
        $announcement = Announcement::where('status', 0)->latest()->get();

        $announcementsData = $announcement->map(function ($item) {
            return [
                'title' => $item->title,
                'content' => $item->content,
                'created_at' => $item->created_at->isoFormat('dddd, D MMMM YYYY'),
            ];
        });
        

        // mengembalikan nilai json
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil.',
            // 'user' => $parent,
            'greetings' => $fullGreeting,
            'present' => $student_absences,
            'announcement' => $announcementsData,
        ]);
    }
}
