<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\TeacherController;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        return $this->sendSuccessResponse($teachers, 'Teachers retrieved successfully');
    }

    // return success response
    public function sendSuccessResponse($result, $message){
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }
}