<?php

namespace App\Http\Controllers;

use App\Models\ClassOfStudent;
use Illuminate\Http\Request;

class ClassOfStudentController extends Controller
{
    public function index(){
        return response()->json(ClassOfStudent::all(), 200);
    }
}
