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
        'qr_code'
    ];

    public function student_absences(){
        return $this->belongsTo(StudentAbsence::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function extracurrirullars(){
        return $this->hasMany(Extracurricular::class);
    }

    public function parent_of_students(){
        return $this->belongsTo(ParentOfStudent::class, 'parent_id');
    }

    public function class_of_students(){
        return $this->belongsTo(ClassOfStudent::class, 'class_of_student_id');
    }
    // protected function createdAt(): Attribute {
    //     return Attribute::make (
    //         get: fn ($value) => \Carbon\Carbon::parse($value)->translatedFormat()
    //     );
    // }
}
