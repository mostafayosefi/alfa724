<?php

namespace App\Models\Cleander;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDayProject extends Model
{

    protected $fillable = [
        'project_id',
        'cleander_day_id',
    ];


    public function cleander_day(){
        return $this->belongsTo(CleanderDay::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
