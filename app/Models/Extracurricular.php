<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function  user(){
        return $this->belongsTo(User::class);
    }
}
