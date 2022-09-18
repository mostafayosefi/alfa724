<?php

namespace App\Models\Score;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreSetting extends Model
{

    protected $fillable = [
        'name',
        'link',
        'status',
        'value',
        'text',
    ];
}
