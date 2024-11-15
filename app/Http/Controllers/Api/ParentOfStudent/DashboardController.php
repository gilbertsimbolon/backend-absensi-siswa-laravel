<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Extracurricular;
use App\Models\ParentOfStudent;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Database\Seeders\ExtracurricularSeeder;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            // Mengambil data pengguna yang terautentikasi melalui token
            $parent = JWTAuth::parseToken()->authenticate();

            // Jika token valid, lanjutkan mengambil data lainnya
            if (!$parent) {
                return response()->json([
                    'status' => false,
                    'message' => 'Pengguna tidak ditemukan, silakan login kembali.',
                ], 404);
            }

            // Comment: Greetings
            $greetingController = new GreetingController();
            $greetings = $greetingController->getGreetings();

            // Comment: Informasi absensi
            $absenceController = new AbsenceController();
            $absence = $absenceController->getAbsence();

            // Comment: Informasi Announcement
            $announcementController = new AnnouncementController();
            $announcementsData = $announcementController->getAnnouncements();

            // Comment: Informasi Extracurricular
            $extracurricularsController = new ExtracurricularController();
            $extracurricular = $extracurricularsController->getExtracurricular();

            // Mengembalikan nilai JSON
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diambil.',
                'greetings' => $greetings,
                'present' => $absence,
                'announcement' => $announcementsData,
                'extracurriculars' => $extracurricular,
            ]);
        } catch (TokenExpiredException $e) {
            // Token sudah kedaluwarsa
            return response()->json([
                'status' => false,
                'message' => 'Token sudah expired, silakan login kembali.',
            ], 401);
        } catch (TokenInvalidException $e) {
            // Token tidak valid
            return response()->json([
                'status' => false,
                'message' => 'Token tidak valid, silakan login kembali.',
            ], 401);
        } catch (JWTException $e) {
            // Token tidak ditemukan atau tidak dapat diproses
            return response()->json([
                'status' => false,
                'message' => 'Token tidak ditemukan, silakan login kembali.',
            ], 401);
        }
    }
}

