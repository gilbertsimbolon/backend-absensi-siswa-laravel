<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return response()->json(Teacher::all(), 200);
    }
}