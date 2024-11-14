<?php

namespace App\Models;

use Attribute;
use App\Models\Announcement;
use App\Models\ClassOfStudent;
use App\Models\StudentAbsence;
use Illuminate\Support\Carbon;
use App\Models\Extracurricular;
use App\Models\ParentOfStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'name',
        'parent_id',
        'phone',
        'class_of_student_id',
        'email',
        'gender',
        'place_born',
        'date_born',
        'address',
        'foto',
    ];

    public function student_absences()
    {
        return $this->hasMany(StudentAbsence::class, 'student_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'students_id');
    }

    public function parent_of_students()
    {
        return $this->belongsTo(ParentOfStudent::class, 'parent_id');
    }

    public function class_of_students()
    {
        return $this->belongsTo(ClassOfStudent::class, 'class_of_student_id');
    }
}
