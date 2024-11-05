<?php

namespace App\Models;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassOfStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_id', 
        'class_name',
    ];

    // Relasi One To One
    public function teacher(){
        return $this->hasOne(Teacher::class);
    }
}
