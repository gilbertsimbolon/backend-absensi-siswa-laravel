<?php

namespace App\Models;

use App\Models\Schedule;
use App\Models\ClassOfStudent;
use App\Models\TeacherAbsence;
use App\Models\Extracurricular;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'concent',
        'phone',
        'email',
        'gender',
        'place_born',
        'date_born',
        'address',
        'foto',
        'qr_code',
    ];

    public function classofstudents(){
        return $this->belongsTo(ClassOfStudent::class);
    }

    public function extracurrirulars(){
        return $this->belongsTo(Extracurricular::class);
    }
    
    public function schedules(){
        return $this->belongsTo(Schedule::class);
    }

    public function teachers_absences(){
        return $this->belongsTo(TeacherAbsence::class);
    }
}
