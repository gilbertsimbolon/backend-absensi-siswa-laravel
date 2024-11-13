<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentOfStudent extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'parent_of_students';
    
    protected $fillable = [
        'mother_name',
        'father_name',
        'kk_number',
        'phone',
        'address',
        'email',
        'password',
    ];

    public function students(){
        return $this->hasMany(Student::class, 'parent_id');
    }

    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }
}
