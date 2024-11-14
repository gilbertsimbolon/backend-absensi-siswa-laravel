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
        'students_id',
        'days',
        'time',
        'activity',
        'teacher_id',
        'user_id'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'students_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
