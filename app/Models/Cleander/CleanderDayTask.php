<?php

namespace App\Models\Cleander;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDayTask extends Model
{

    protected $fillable = [
        'task_id',
        'cleander_day_id',
    ];


    public function cleander_day(){
        return $this->belongsTo(CleanderDay::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }




}
