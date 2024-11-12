<?php

use Illuminate\Http\Request;
use App\Models\ParentOfStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Resources\ParentOfStudentResources;
use App\Http\Controllers\ClassOfStudentController;
use App\Http\Controllers\ParentOfStudentController;

// Auth::routes(['register' => false]);


// testing api
Route::get('/test-api', function () {
    return response()->json(['status' => true, 'message' => 'API is working!']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'api', 'prefix' => 'parent'], function ($router) {
    Route::post('login', [ParentOfStudentController::class, 'login']);
    Route::post('register', [ParentOfStudentController::class, 'register']);
    Route::post('logout', [ParentOfStudentController::class, 'logout']);
    Route::post('refresh', [ParentOfStudentController::class, 'refresh']);
    Route::post('me', [ParentOfStudentController::class, 'me']);
});
// Route::post('/parent', [ParentOfStudentController::class, 'store']);
