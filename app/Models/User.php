<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Schedule;
use App\Models\Announcement;
use App\Models\StudentAbsence;
use App\Models\TeacherAbsence;
use App\Models\Extracurricular;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the JWT identifier.
     *
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the JWT custom claims.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return []; // You can add custom claims here if needed
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    public function extracurrirulars(){
        return $this->hasMany(Extracurricular::class);
    }

    public function student_absences(){
        return $this->hasMany(StudentAbsence::class,'user_id');
    }

    public function teacher_absences(){
        return $this->hasMany(TeacherAbsence::class);
    }

    public function shedules(){
        return $this->hasMany(Schedule::class);
    }
}
