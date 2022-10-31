<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingAbsence extends Model
{


    protected $fillable = [
        'time_enter', 'time_float', 'status',
    ];
}
