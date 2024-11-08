<?php

namespace App\Models;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;

class TeacherAbsence extends Model
{
    protected $fillable = ['present'];

    public function teachers(){
        return $this->belongsTo(Teacher::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
