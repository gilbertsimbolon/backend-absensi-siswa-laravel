<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ParentOfStudent;
use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Database\Seeders\ExtracurricularSeeder;
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
        $extracurricularsController = new ExtracurricularController();
        $extracurricular = $extracurricularsController->getExtracurricular();

        // mengembalikan nilai json
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diambil.',
            // 'user' => $parent,
            'greetings' => $greetings,
            'present' => $absence,
            'announcement' => $announcementsData,
            'extracurriculars' => $extracurricular,
        ]);
    }
}
