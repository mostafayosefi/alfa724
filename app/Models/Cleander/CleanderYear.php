<?php

namespace App\Models\Cleander;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderYear extends Model
{

    protected $fillable = [
        'year',  
    ];


    
    public function cleander_months(){
        return $this->hasMany(CleanderMonth::class , 'cleander_year_id');
    }

}
