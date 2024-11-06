<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassOfStudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/class-of-students', [ClassOfStudentController::class, 'index']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');