<?php

namespace App\Models;

use App\Models\ClassOfStudent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    // Relasi One to One ClassOfStudent - Teacher
    public function classofstudent(){
        return $this->belongsTo(ClassOfStudent::class);
    }
}
