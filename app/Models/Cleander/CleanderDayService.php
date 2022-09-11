<?php

namespace App\Models\Cleander;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleanderDayService extends Model
{

    protected $fillable = [
        'service_id',
        'cleander_day_id',
    ];


    public function cleander_day(){
        return $this->belongsTo(CleanderDay::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
