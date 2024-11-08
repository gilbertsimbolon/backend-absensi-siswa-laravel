<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Teacher;

class Extracurricular extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_of_student_id',
        'user_id',
        'teacher_id',
        'days',
        'time',
        'activity',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    } 
}
