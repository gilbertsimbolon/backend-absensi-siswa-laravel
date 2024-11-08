<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassOfStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name',
        'teacher_id', 
        'class_name',
    ];
    
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }

    public function student(){
        return $this->hasMany(Student::class);
    }

    public function schedules(){
        return $this->belongsTo(Schedule::class);
    }
}
