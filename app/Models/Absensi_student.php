<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi_student extends Model
{
    protected $filllable = [
        'nisn',
        'date',
        'status',
        'note',
        'qr_code',
        'time_in',
        'time_out',
    ];
}
