<?php

namespace App\Models\Score;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreTask extends Model
{

    protected $fillable = [
        'score_id',
        'task_id',
    ];


    public function score(){
        return $this->belongsTo(Score::class);
    }

    public function task(){
        return $this->belongsTo(Task::class);
    }}
