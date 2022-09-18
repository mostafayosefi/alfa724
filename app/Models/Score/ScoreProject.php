<?php

namespace App\Models\Score;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreProject extends Model
{

    protected $fillable = [
        'score_id',
        'project_id',
    ];


    public function score(){
        return $this->belongsTo(Score::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
