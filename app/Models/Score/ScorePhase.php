<?php

namespace App\Models\Score;

use App\Models\Phase;
use App\Models\Score;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScorePhase extends Model
{

    protected $fillable = [
        'score_id',
        'phase_id',
    ];


    public function score(){
        return $this->belongsTo(Score::class);
    }

    public function phase(){
        return $this->belongsTo(Phase::class);
    }


}
