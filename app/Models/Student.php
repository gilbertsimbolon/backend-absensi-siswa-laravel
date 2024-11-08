<?php

namespace App\Models;

use Attribute;
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

    // announcements relasi one to one

    // protected function createdAt(): Attribute {
    //     return Attribute::make (
    //         get: fn ($value) => \Carbon\Carbon::parse($value)->translatedFormat()
    //     );
    // }
}
