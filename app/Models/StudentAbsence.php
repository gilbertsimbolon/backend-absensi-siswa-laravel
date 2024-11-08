<?php

namespace App\Models;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentAbsence extends Model
{
    protected $filllable = ['enum'];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
