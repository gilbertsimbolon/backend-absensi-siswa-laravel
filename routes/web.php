<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\IndexHint;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ParentMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin/dashboard', [AdminMiddleware::class, 'index']);
});

Route::middleware(ParentMiddleware::class)->group(function(){
    Route::get('/parent/dashboard', [ParentMiddleware::class, 'dashboard']);
});