<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_of_student_id',
        'user_id',
        'teacher_id',
        'days',
        'time',
        'subject',
    ];
}
