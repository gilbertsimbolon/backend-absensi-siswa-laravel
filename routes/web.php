<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ParentMiddleware;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Route::prefix('/user')->group(function (){
//     Route::get('/home', [UserController::class, 'index'])->name('home');
//     Route::get('registrasi', [UserController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/registrasi', [UserController::class, 'register']);
// })->middleware('auth:sanctum');

// Route::middleware([AdminMiddleware::class])->group(function(){
//     Route::get('/admin/dashboard', [AdminMiddleware::class, 'index']);
// });

// Route::middleware(ParentMiddleware::class)->group(function(){
//     Route::get('/parent/dashboard', [ParentMiddleware::class, 'dashboard']);
// });