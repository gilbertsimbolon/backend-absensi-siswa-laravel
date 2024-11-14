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
    ];

    public function classofstudents()
    {
        return $this->hasMany(ClassOfStudent::class);
    }

    public function extracurriculars()
    {
        return $this->hasMany(Extracurricular::class, 'teachers_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function teachers_absences()
    {
        return $this->hasMany(TeacherAbsence::class);
    }
}
