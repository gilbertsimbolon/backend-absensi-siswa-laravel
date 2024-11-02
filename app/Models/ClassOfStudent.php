<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassOfStudent extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'class_name'];
}
