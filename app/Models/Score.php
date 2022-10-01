<?php

namespace App\Models;

use App\Models\Score\ScorePhase;
use App\Models\Score\ScoreProject;
use App\Models\Score\ScoreTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'value',
        'description',
        'model',
        'model_id',
        'pre',
        'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function score_phases(){
        return $this->hasMany(ScorePhase::class , 'score_id');
    }


    public function score_projects(){
        return $this->hasMany(ScoreProject::class , 'score_id');
    }


    public function score_tasks(){
        return $this->hasMany(ScoreTask::class , 'score_id');
    }


}
