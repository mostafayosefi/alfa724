<?php

namespace App\Models;

use App\Models\Cleander\CleanderDayPhase;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phase extends Model
{
    use SoftDeletes, CascadeSoftDeletes;
    use HasFactory;
    protected $table='phases';
    protected $fillable=['title','project_id','start_date','finish_date'];
    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date',
    ];
    protected $cascadeDeletes = ['tasks'];

    public function for() {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class, 'phase_id');
    }



    public function cleander_day_phases(){
        return $this->hasMany(CleanderDayPhase::class , 'phase_id');
    }

}
