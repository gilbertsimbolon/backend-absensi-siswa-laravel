<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Resources\ParentOfStudentResources;
use App\Http\Controllers\ClassOfStudentController;
use App\Http\Controllers\ParentOfStudentController;

// Auth::routes(['register' => false]);


// testing api
Route::get('/test-api', function () {
    return response()->json(['status' => true, 'message' => 'API is working!']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/parent', [ParentOfStudentController::class, 'store']);

// Route::get('/login', [AuthController::class, 'login']);
// Route::get('/teacher', [TeacherController::class, 'index']);
// Route::get('/class-of-students', [ClassOfStudentController::class, 'index']);