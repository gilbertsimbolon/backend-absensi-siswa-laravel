<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
