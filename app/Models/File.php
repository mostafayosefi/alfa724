<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = [
        'name', 'model', 'model_id', 'model_sub_id',
    ];
}
