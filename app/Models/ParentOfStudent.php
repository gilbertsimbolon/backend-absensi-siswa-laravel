<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentOfStudent extends Model
{
    protected $fillable = [
        'mother_name',
        'father_name',
        'kk_number',
        'phone',
        'address',
        'email',
        'password',
    ];
}
