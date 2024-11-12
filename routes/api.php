<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherController;
use App\Http\Resources\ParentOfStudentResources;
use App\Http\Controllers\ClassOfStudentController;
use App\Http\Controllers\ParentOfStudentController;
use App\Models\ParentOfStudent;

// Auth::routes(['register' => false]);


// testing api
Route::get('/test-api', function () {
    return response()->json(['status' => true, 'message' => 'API is working!']);
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/user')->group(function (){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/parent', [ParentOfStudentController::class, 'store']);
