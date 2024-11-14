<?php

namespace App\Http\Controllers\Api\ParentOfStudent;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Student;

class GreetingController extends Controller
{
    public function getGreetings()
    {
        $parent = auth()->guard('api_parent_of_students')->user();

        $students = $parent->students;

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

        return $fullGreeting;
    }
}
