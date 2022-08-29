<?php

namespace App\Models\Cleander;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderToday extends Model
{
  
    protected $fillable = [
        'miladi', 'shamsi', 'year', 
        'month', 'day',  
    ];


}
