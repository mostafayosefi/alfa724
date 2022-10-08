<?php

namespace App\Models;

use App\Models\Cleander\CleanderDayProject;
use App\Models\Price\PriceMyProject;
use App\Models\Score\ScoreProject;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    use CascadeSoftDeletes;
    use HasFactory;
    protected $table='projects';
    protected $fillable=['title','description','start_date','finish_date', 'status',
    'customer_name',
    'customer_phone',
    'customer_mobile',
    'customer_job',
    'customer_provider',
    'customer_service',
    'price',
    'counter',
    'employer',
    'customer_id',
    'giving_date',  'zero_date', 'time',
    ];
    protected $casts = [
        'start_date' => 'date',
        'finish_date' => 'date',
    ];
    protected $cascadeDeletes = ['employeeProjects', 'Phase', 'tasks'];

    public function Phase() {
        return $this->hasOne(Phase::class, 'project_id');
    }

    public function employees(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'employee_project', 'project_id', 'employee_id');
    }

    public function employeeProjects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(EmployeeProject::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }



    public function cleander_day_projects(){
        return $this->hasMany(CleanderDayProject::class , 'project_id');
    }




    public function score_projects(){
        return $this->hasMany(ScoreProject::class , 'project_id');
    }



    public function customer(){
        return $this->belongsTo(Customer::class);
    }


    public function price_my_projects(){
        return $this->hasMany(PriceMyProject::class , 'project_id');
    }


}
