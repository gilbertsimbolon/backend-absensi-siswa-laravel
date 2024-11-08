<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teacher;
use App\Models\ClassOfStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    // Comment: Relasi Many to One Schedule ke ClassOfStudent
    public function class_of_students(){
        return $this->hasMany(ClassOfStudent::class);
    }

    // Comment: Relasi One to One Schedule ke Teacher
    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

    // Comment: Relasi Many to One Schedule ke User
    public function users(){
        return $this->hasMany(User::class);
    }
}
