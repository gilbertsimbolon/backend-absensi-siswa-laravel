<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'name',
        'class',
        'phone',
        'email',
        'gender',
        'place_born',
        'date_born',
        'address',
        'foto',
        'qr_code'
    ];
}
