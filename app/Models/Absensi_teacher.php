<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi_teacher extends Model
{
    protected $fillable = [
        'nip',
        'date',
        'status',
        'note',
        'qr_code',
        'time_in',
        'time_out'
    ];
}
