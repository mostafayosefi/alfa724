<?php

namespace App\Models\Cleander;

use App\Models\Phase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDayPhase extends Model
{

    protected $fillable = [
        'phase_id',
        'cleander_day_id',
    ];


    public function cleander_day(){
        return $this->belongsTo(CleanderDay::class);
    }

    public function phase(){
        return $this->belongsTo(Phase::class);
    }

}
