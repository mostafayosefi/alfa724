<?php

namespace App\Models\Cleander;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDay extends Model
{

    protected $fillable = [
        'date', 'holiday', 'day',
        'cleander_month_id',
    ];



    public function cleander_month(){
        return $this->belongsTo(CleanderMonth::class);
    }


    public function cleander_day_tasks(){
        return $this->hasMany(CleanderDayTask::class , 'cleander_day_id');
    }


    public function cleander_day_projects(){
        return $this->hasMany(CleanderDayProject::class , 'cleander_day_id');
    }

    public function cleander_day_phases(){
        return $this->hasMany(CleanderDayPhase::class , 'cleander_day_id');
    }

    public function cleander_day_services(){
        return $this->hasMany(CleanderDayService::class , 'cleander_day_id');
    }


}
