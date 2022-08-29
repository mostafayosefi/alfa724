<?php

namespace App\Models\Cleander;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderMonth extends Model
{
 
    
    protected $fillable = [
        'name',  'month',  
        'weekdayfirst',  'datefirst',  
        'countdayprev',  'countdaymonth',  
        'cleander_year_id',    
    ];

    
    public function cleander_year(){
        return $this->belongsTo(CleanderYear::class);
    }


    public function cleander_days(){
        return $this->hasMany(CleanderDay::class , 'cleander_month_id');
    }

}
