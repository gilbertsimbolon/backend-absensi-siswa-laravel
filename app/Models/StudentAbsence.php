<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class StudentAbsence extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'enum',
        'student_id', 
        'user_id',
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    // public function student_absences(){
    //     return $this->belongsTo(StudentAbsence::class);
    // }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
